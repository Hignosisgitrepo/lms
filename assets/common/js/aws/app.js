//import { AsyncScheduler, ConsoleLogger, DataMessage, DefaultActiveSpeakerPolicy, DefaultAudioMixController, DefaultDeviceController, DefaultMeetingSession, DefaultModality, DefaultBrowserBehavior, LogLevel, MultiLogger, MeetingSessionConfiguration, MeetingSessionPOSTLogger, MeetingSessionStatusCode, TimeoutScheduler, Versioning, SimulcastLayers } from '../../../../src/index';

class DemoTileOrganizer {
    constructor() {
        this.tiles = {};
        this.tileStates = {};
        this.remoteTileCount = 0;
    }
    acquireTileIndex(tileId) {
        for (let index = 0; index <= DemoTileOrganizer.MAX_TILES; index++) {
            if (this.tiles[index] === tileId) {
                return index;
            }
        }
        for (let index = 0; index <= DemoTileOrganizer.MAX_TILES; index++) {
            if (!(index in this.tiles)) {
                this.tiles[index] = tileId;
                this.remoteTileCount++;
                return index;
            }
        }
        throw new Error('no tiles are available');
    }
    releaseTileIndex(tileId) {
        for (let index = 0; index <= DemoTileOrganizer.MAX_TILES; index++) {
            if (this.tiles[index] === tileId) {
                this.remoteTileCount--;
                delete this.tiles[index];
                return index;
            }
        }
        return DemoTileOrganizer.MAX_TILES;
    }
}

DemoTileOrganizer.MAX_TILES = 17;
class TestSound {
    constructor(sinkId, frequency = 440, durationSec = 1, rampSec = 0.1, maxGainValue = 0.1) {
        // @ts-ignore
        const audioContext = new (window.AudioContext || window.webkitAudioContext)();
        const gainNode = audioContext.createGain();
        gainNode.gain.value = 0;
        const oscillatorNode = audioContext.createOscillator();
        oscillatorNode.frequency.value = frequency;
        oscillatorNode.connect(gainNode);
        const destinationStream = audioContext.createMediaStreamDestination();
        gainNode.connect(destinationStream);
        const currentTime = audioContext.currentTime;
        const startTime = currentTime + 0.1;
        gainNode.gain.linearRampToValueAtTime(0, startTime);
        gainNode.gain.linearRampToValueAtTime(maxGainValue, startTime + rampSec);
        gainNode.gain.linearRampToValueAtTime(maxGainValue, startTime + rampSec + durationSec);
        gainNode.gain.linearRampToValueAtTime(0, startTime + rampSec * 2 + durationSec);
        oscillatorNode.start();
        const audioMixController = new DefaultAudioMixController();
        // @ts-ignore
        audioMixController.bindAudioDevice({ deviceId: sinkId });
        audioMixController.bindAudioElement(new Audio());
        audioMixController.bindAudioStream(destinationStream.stream);
        new TimeoutScheduler((rampSec * 2 + durationSec + 1) * 1000).start(() => {
            audioContext.close();
        });
    }
}

var startButton = document.getElementById("join_meeting");
var stopButton = document.getElementById("button-meeting-end");

var urlParams = new URLSearchParams(window.location.search);



// if (!isMeetingHost) {
//     startButton.innerText = "Join!";
// } else {
//     startButton.innerText = "Start!";
//     stopButton.style.display = "block";
// }

// startButton.style.display = "block";

async function start() {

    if (window.meetingSession) {
        return
    }
    try {
        var data_value = $("#meeting_value").data('value').split("_");
        var meetingId = data_value[0];
        
        if(data_value[1] == 0){
            var isattendeeId = true;
            var attendeeId = data_value[1];
        } else {
            var isattendeeId = false;
            var attendeeId = data_value[1];
        }

        var customer_id = data_value[2];
        
        if(data_value[3] == 1){
            var isMeetingHost = true;
        } else {
            var isMeetingHost = false;
        }
     

        if(!isattendeeId){ //GETTING MEETING AND ATTEENDED DETAILS
            const formData_attendee = new FormData();
            formData_attendee.append('attendeeId', attendeeId);
            formData_attendee.append('meetingId', meetingId);
            formData_attendee.append('customer_id', customer_id);
            let requestPath_attendee = get_attendee_details;
            var response_attendee = await fetch(requestPath_attendee, {
                method: "POST",
                headers: new Headers(),
                body: formData_attendee
            });
            const data = await response_attendee.json();

            const logger = new ChimeSDK.ConsoleLogger('ChimeMeetingLogs', ChimeSDK.LogLevel.INFO);
            const deviceController = new ChimeSDK.DefaultDeviceController(logger);
            const configuration = new ChimeSDK.MeetingSessionConfiguration(data.Info.Meeting, data.Info.Attendee);
            const meetingSession = new ChimeSDK.DefaultMeetingSession(configuration, logger, deviceController);

            try {

                const audioInputs = await meetingSession.audioVideo.listAudioInputDevices();
                await this.populateAudioInputList(audioInputs);

                const videoInputs = await meetingSession.audioVideo.listVideoInputDevices();
                await this.populateVideoInputList(videoInputs);
                

                const videoOutputs = await meetingSession.audioVideo.listAudioOutputDevices();
                await this.populateAudioOutputList(videoOutputs);

                

                await meetingSession.audioVideo.chooseAudioInputDevice(audioInputs[0].deviceId);
                await meetingSession.audioVideo.chooseVideoInputDevice(videoInputs[0].deviceId);
            } catch (err) {
                alert(err);
            }

            const observer = {
                // videoTileDidUpdate is called whenever a new tile is created or tileState changes.
                videoTileDidUpdate: (tileState) => {
                    console.log("VIDEO TILE DID UPDATE");
                    console.log(tileState);
                    // Ignore a tile without attendee ID and other attendee's tile.
                    if (!tileState.boundAttendeeId) {
                        return;
                    }
                    updateTiles(meetingSession, isMeetingHost);
                    
                    showPreview(meetingSession);
                },
            };

            meetingSession.audioVideo.addObserver(observer);
            meetingSession.audioVideo.startLocalVideoTile();

            const audioOutputElement = document.getElementById("meeting-audio");
            meetingSession.audioVideo.bindAudioElement(audioOutputElement);
            meetingSession.audioVideo.start();
            
        }
        
    } catch (err) {
        console.log(err);
    }
}

function updateTiles(meetingSession, isMeetingHost) {
    const tiles = meetingSession.audioVideo.getAllVideoTiles();
    console.log("tiles", tiles);
         tiles.forEach(tile => {
            let tileId = tile.tileState.tileId
            let boundExternalUserId = tile.tileState.boundExternalUserId.split("_");
            var videoElement = document.getElementById("video-" + tileId);

            if (!videoElement) {
                videoElement = document.createElement("video");
                videoElement.id = "video-" + tileId;
                if(boundExternalUserId.length == 4){
                    document.getElementById("video-list-hosting").append(videoElement);
                } else {
                     document.getElementById("video-list").append(videoElement);
                }      
                meetingSession.audioVideo.bindVideoElement(
                    tileId,
                    videoElement
                );
            }
        })
}

function showPreview(meetingSession){
    const tiles = meetingSession.audioVideo.getAllVideoTiles();
    console.log("tiles", tiles);
    tiles.forEach(tile => {
        let tileId = tile.tileState.tileId
        var videoElement = document.getElementById("video-" + tileId);

        if (!videoElement) {
            videoElement = document.createElement("video");
            videoElement.id = "video-" + tileId;
            document.getElementById('video-preview').append(videoElement);
            meetingSession.audioVideo.bindVideoElement(
                tileId,
                videoElement
            );

            document.getElementById(videoElement.id).style.width = "inherit";
        }
    })
}

async function stop() {
    const response = await fetch("end", {
        body: {
            meetingId: meetingId,
        },
        method: "POST",
        headers: new Headers(),
    });

    const data = await response.json();
    console.log(data);
}

function showMeeting(e) {
    e.preventDefault();
    
    try {
        // var data_value = $("#meeting_value").data('value').split("_");
        // var meetingId = data_value[0];
        // var customer_id = data_value[2];
        // if(data_value[1] == 0){
        //     var isattendeeId = true;
        //     var attendeeId = data_value[1];
        // } else {
        //     var isattendeeId = false;
        //     var attendeeId = data_value[1];
        // }
        document.getElementById('flow-devices').style.display='none';
        document.getElementById('flow-meeting').style.display='block';
        

       
        
    } catch (err) {
        console.log(err);
    }
}

window.addEventListener("DOMContentLoaded", () => {
    startButton.addEventListener("click", showMeeting);

    //if (isMeetingHost) {
        stopButton.addEventListener("click", stop);
    //}
    start();
});

function createDropdownMenuItem(menu, title, clickHandler, id) {
    const button = document.createElement('button');
    menu.appendChild(button);
    button.innerText = title;
    button.classList.add('dropdown-item');
    this.updateProperty(button, 'id', id);
    button.addEventListener('click', () => {
        clickHandler();
    });
    return button;
}

async function populateAudioInputList(audioInputs) {
    const genericName = 'Microphone';
    const additionalDevices = [];
    this.populateDeviceList('audio-input', genericName, audioInputs, additionalDevices);
    this.populateInMeetingDeviceList('dropdown-menu-microphone', genericName, audioInputs, additionalDevices, async (name) => {
        const device = await this.audioInputSelectionToDevice(name);
        await this.audioVideo.chooseAudioInputDevice(device);
    });
}

async function populateVideoInputList(videoInputs) {
    const genericName = 'Camera';
    const additionalDevices = [];
    this.populateDeviceList('video-input', genericName, videoInputs, additionalDevices);
    this.populateInMeetingDeviceList('dropdown-menu-camera', genericName, videoInputs, additionalDevices, async (name) => {
        try {
            await this.openVideoInputFromSelection(name, true, videoInputs);
        }
        catch (err) {
            this.log('no video input device selected');
        }
    });
    const cameras = videoInputs;
    this.cameraDeviceIds = cameras.map((deviceInfo) => {
        return deviceInfo.deviceId;
    });
    // videoInputsaudioVideo.bindVideoElement(document.getElementById('video-preview'));

}



async function populateAudioOutputList(videoOutputs) {
    const genericName = 'Speaker';
    const additionalDevices = [];
    this.populateDeviceList('audio-output', genericName, videoOutputs, additionalDevices);
    this.populateInMeetingDeviceList('dropdown-menu-speaker', genericName, videoOutputs, additionalDevices, async (name) => {
        await this.audioVideo.chooseAudioOutputDevice(name);
    });
}


async function openAudioInputFromSelection() {
    const audioInput = document.getElementById('audio-input');
    const device = await this.audioInputSelectionToDevice(audioInput.value);
    await this.audioVideo.chooseAudioInputDevice(device);
    this.startAudioPreview();
}

function populateDeviceList(elementId, genericName, devices, additionalOptions) {
    const list = document.getElementById(elementId);
    while (list.firstElementChild) {
        list.removeChild(list.firstElementChild);
    }
    for (let i = 0; i < devices.length; i++) {
        const option = document.createElement('option');
        list.appendChild(option);
        option.text = devices[i].label || `${genericName} ${i + 1}`;
        option.value = devices[i].deviceId;
    }
    if (additionalOptions.length > 0) {
        const separator = document.createElement('option');
        separator.disabled = true;
        separator.text = '──────────';
        list.appendChild(separator);
        for (const additionalOption of additionalOptions) {
            const option = document.createElement('option');
            list.appendChild(option);
            option.text = additionalOption;
            option.value = additionalOption;
        }
    }
    if (!list.firstElementChild) {
        const option = document.createElement('option');
        option.text = 'Device selection unavailable';
        list.appendChild(option);
    }
}

function populateInMeetingDeviceList(elementId, genericName, devices, additionalOptions, callback) {
    const menu = document.getElementById(elementId);
    while (menu.firstElementChild) {
        menu.removeChild(menu.firstElementChild);
    }
    for (let i = 0; i < devices.length; i++) {
        this.createDropdownMenuItem(menu, devices[i].label || `${genericName} ${i + 1}`, () => {
            callback(devices[i].deviceId);
        });
    }
    if (additionalOptions.length > 0) {
        this.createDropdownMenuItem(menu, '──────────', () => { }).classList.add('text-center');
        for (const additionalOption of additionalOptions) {
            this.createDropdownMenuItem(menu, additionalOption, () => {
                callback(additionalOption);
            }, `${elementId}-${additionalOption.replace(/\s/g, '-')}`);
        }
    }
    if (!menu.firstElementChild) {
        this.createDropdownMenuItem(menu, 'Device selection unavailable', () => { });
    }
}


function audioInputsChanged(_freshAudioInputDeviceList) {
        this.populateAudioInputList();
    }

function videoInputsChanged(_freshVideoInputDeviceList) {
        this.populateVideoInputList();
    }

async function audioInputSelectionToDevice(value) {
        if (this.isRecorder() || this.isBroadcaster()) {
            return null;
        }
        if (value === '440 Hz') {
            return DefaultDeviceController.synthesizeAudioDevice(440);
        }
        if (value === 'None') {
            return null;
        }
        return value;
    }

function isRecorder() {
        return (new URL(window.location.href).searchParams.get('record')) === 'true';
    }

function isBroadcaster() {
        return (new URL(window.location.href).searchParams.get('broadcast')) === 'true';
    }

function updateProperty(obj, key, value) {
    if (value !== undefined && obj[key] !== value) {
        obj[key] = value;
    }
}

function startAudioPreview() {
    this.setAudioPreviewPercent(0);
    const analyserNode = this.audioVideo.createAnalyserNodeForAudioInput();
    if (!analyserNode) {
        return;
    }
    if (!analyserNode.getByteTimeDomainData) {
        document.getElementById('audio-preview').parentElement.style.visibility = 'hidden';
        return;
    }
    const data = new Uint8Array(analyserNode.fftSize);
    let frameIndex = 0;
    this.analyserNodeCallback = () => {
        if (frameIndex === 0) {
            analyserNode.getByteTimeDomainData(data);
            const lowest = 0.01;
            let max = lowest;
            for (const f of data) {
                max = Math.max(max, (f - 128) / 128);
            }
            let normalized = (Math.log(lowest) - Math.log(max)) / Math.log(lowest);
            let percent = Math.min(Math.max(normalized * 100, 0), 100);
            this.setAudioPreviewPercent(percent);
        }
        frameIndex = (frameIndex + 1) % 2;
        requestAnimationFrame(this.analyserNodeCallback);
    };
    requestAnimationFrame(this.analyserNodeCallback);
}

function setAudioPreviewPercent(percent) {
    const audioPreview = document.getElementById('audio-preview');
    this.updateProperty(audioPreview.style, 'transitionDuration', '33ms');
    this.updateProperty(audioPreview.style, 'width', `${percent}%`);
    if (audioPreview.getAttribute('aria-valuenow') !== `${percent}`) {
        audioPreview.setAttribute('aria-valuenow', `${percent}`);
    }
}

document.getElementById('button-test-sound').addEventListener('click', e => {
    e.preventDefault();
    beep();
    const audioOutput = document.getElementById('audio-output');
    // new TestSound(audioOutput.value);
});

function beep() {
    var snd = new Audio("data:audio/wav;base64,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qJrx4KOQjahZxWbcZgztj2c49nKmkId44S71j0c8eV9yDK6uPRzx5X18eDvjvQ6yKo9ZSS6l//8elePK/Lf//IInrOF/FvDoADYAGBMGb7FtErm5MXMlmPAJQVgWta7Zx2go+8xJ0UiCb8LHHdftWyLJE0QIAIsI+UbXu67dZMjmgDGCGl1H+vpF4NSDckSIkk7Vd+sxEhBQMRU8j/12UIRhzSaUdQ+rQU5kGeFxm+hb1oh6pWWmv3uvmReDl0UnvtapVaIzo1jZbf/pD6ElLqSX+rUmOQNpJFa/r+sa4e/pBlAABoAAAAA3CUgShLdGIxsY7AUABPRrgCABdDuQ5GC7DqPQCgbbJUAoRSUj+NIEig0YfyWUho1VBBBA//uQZB4ABZx5zfMakeAAAAmwAAAAF5F3P0w9GtAAACfAAAAAwLhMDmAYWMgVEG1U0FIGCBgXBXAtfMH10000EEEEEECUBYln03TTTdNBDZopopYvrTTdNa325mImNg3TTPV9q3pmY0xoO6bv3r00y+IDGid/9aaaZTGMuj9mpu9Mpio1dXrr5HERTZSmqU36A3CumzN/9Robv/Xx4v9ijkSRSNLQhAWumap82WRSBUqXStV/YcS+XVLnSS+WLDroqArFkMEsAS+eWmrUzrO0oEmE40RlMZ5+ODIkAyKAGUwZ3mVKmcamcJnMW26MRPgUw6j+LkhyHGVGYjSUUKNpuJUQoOIAyDvEyG8S5yfK6dhZc0Tx1KI/gviKL6qvvFs1+bWtaz58uUNnryq6kt5RzOCkPWlVqVX2a/EEBUdU1KrXLf40GoiiFXK///qpoiDXrOgqDR38JB0bw7SoL+ZB9o1RCkQjQ2CBYZKd/+VJxZRRZlqSkKiws0WFxUyCwsKiMy7hUVFhIaCrNQsKkTIsLivwKKigsj8XYlwt/WKi2N4d//uQRCSAAjURNIHpMZBGYiaQPSYyAAABLAAAAAAAACWAAAAApUF/Mg+0aohSIRobBAsMlO//Kk4soosy1JSFRYWaLC4qZBYWFRGZdwqKiwkNBVmoWFSJkWFxX4FFRQWR+LsS4W/rFRb/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////VEFHAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAU291bmRib3kuZGUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMjAwNGh0dHA6Ly93d3cuc291bmRib3kuZGUAAAAAAAAAACU=");  
    snd.play();
}

async function openVideoInputFromSelection(selection, showPreview, videoInputs) {
    alert(selection);
    if (selection) {
        this.selectedVideoInput = selection;
    }
    this.log(`Switching to: ${this.selectedVideoInput}`);
    const device = this.videoInputSelectionToDevice(this.selectedVideoInput);
    if (device === null) {
        if (showPreview) {
            videoInputs.stopVideoPreviewForVideoInput(document.getElementById('video-preview'));
        }
        videoInputs.stopLocalVideoTile();
        this.toggleButton('button-camera', 'off');
        // choose video input null is redundant since we expect stopLocalVideoTile to clean up
        await videoInputs.chooseVideoInputDevice(device);
        throw new Error('no video device selected');
    }
    await videoInputs.chooseVideoInputDevice(device);
    if (showPreview) {
        this.audioVideo.startVideoPreviewForVideoInput(document.getElementById('video-preview'));
    }
}

function videoInputSelectionToDevice(value) {
    if (this.isRecorder() || this.isBroadcaster()) {
        return null;
    }
    if (value === 'Blue') {
        return DefaultDeviceController.synthesizeVideoDevice('blue');
    }
    else if (value === 'SMPTE Color Bars') {
        return DefaultDeviceController.synthesizeVideoDevice('smpte');
    }
    else if (value === 'None') {
        return null;
    }
    return value;
}

const buttonContentShare = document.getElementById('button-content-share');
buttonContentShare.addEventListener('click', _e => {
    alert("s");
    // new AsyncScheduler().start(() => {
    //     if (!this.isButtonOn('button-content-share')) {
            this.contentShareStart();
        // }
        // else {
        //     this.contentShareStop();
        // }
    // });
});

async function contentShareStart(videoUrl) {
    // this.toggleButton('button-content-share');
    switch (this.contentShareType) {
        case ContentShareType.ScreenCapture:
            this.audioVideo.startContentShareFromScreenCapture();
            break;
        case ContentShareType.VideoFile:
            const videoFile = document.getElementById('content-share-video');
            if (videoUrl) {
                videoFile.src = videoUrl;
            }
            await videoFile.play();
            let mediaStream;
            if (this.defaultBrowserBehaviour.hasFirefoxWebRTC()) {
                // @ts-ignore
                mediaStream = videoFile.mozCaptureStream();
            }
            else {
                // @ts-ignore
                mediaStream = videoFile.captureStream();
            }
            this.audioVideo.startContentShare(mediaStream);
            break;
    }
}

async function contentShareStop() {
        if (this.isButtonOn('button-pause-content-share')) {
            this.toggleButton('button-pause-content-share');
        }
        this.toggleButton('button-content-share');
        this.audioVideo.stopContentShare();
        if (this.contentShareType === ContentShareType.VideoFile) {
            const videoFile = document.getElementById('content-share-video');
            videoFile.pause();
            videoFile.style.display = 'none';
        }
}

