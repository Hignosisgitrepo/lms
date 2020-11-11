<?php
// This file was auto-generated from sdk-root/src/data/mediatailor/2018-04-23/api-2.json
return [ 'metadata' => [ 'apiVersion' => '2018-04-23', 'endpointPrefix' => 'api.mediatailor', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceAbbreviation' => 'MediaTailor', 'serviceFullName' => 'AWS MediaTailor', 'serviceId' => 'MediaTailor', 'signatureVersion' => 'v4', 'signingName' => 'mediatailor', 'uid' => 'mediatailor-2018-04-23', ], 'operations' => [ 'DeletePlaybackConfiguration' => [ 'errors' => [], 'http' => [ 'method' => 'DELETE', 'requestUri' => '/playbackConfiguration/{Name}', 'responseCode' => 204, ], 'input' => [ 'shape' => 'DeletePlaybackConfigurationRequest', ], 'name' => 'DeletePlaybackConfiguration', 'output' => [ 'shape' => 'DeletePlaybackConfigurationResponse', ], ], 'GetPlaybackConfiguration' => [ 'errors' => [], 'http' => [ 'method' => 'GET', 'requestUri' => '/playbackConfiguration/{Name}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetPlaybackConfigurationRequest', ], 'name' => 'GetPlaybackConfiguration', 'output' => [ 'shape' => 'GetPlaybackConfigurationResponse', ], ], 'ListPlaybackConfigurations' => [ 'errors' => [], 'http' => [ 'method' => 'GET', 'requestUri' => '/playbackConfigurations', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListPlaybackConfigurationsRequest', ], 'name' => 'ListPlaybackConfigurations', 'output' => [ 'shape' => 'ListPlaybackConfigurationsResponse', ], ], 'ListTagsForResource' => [ 'errors' => [ [ 'shape' => 'BadRequestException', ], ], 'http' => [ 'method' => 'GET', 'requestUri' => '/tags/{ResourceArn}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListTagsForResourceRequest', ], 'name' => 'ListTagsForResource', 'output' => [ 'shape' => 'ListTagsForResourceResponse', ], ], 'PutPlaybackConfiguration' => [ 'errors' => [], 'http' => [ 'method' => 'PUT', 'requestUri' => '/playbackConfiguration', 'responseCode' => 200, ], 'input' => [ 'shape' => 'PutPlaybackConfigurationRequest', ], 'name' => 'PutPlaybackConfiguration', 'output' => [ 'shape' => 'PutPlaybackConfigurationResponse', ], ], 'TagResource' => [ 'errors' => [ [ 'shape' => 'BadRequestException', ], ], 'http' => [ 'method' => 'POST', 'requestUri' => '/tags/{ResourceArn}', 'responseCode' => 204, ], 'input' => [ 'shape' => 'TagResourceRequest', ], 'name' => 'TagResource', ], 'UntagResource' => [ 'errors' => [ [ 'shape' => 'BadRequestException', ], ], 'http' => [ 'method' => 'DELETE', 'requestUri' => '/tags/{ResourceArn}', 'responseCode' => 204, ], 'input' => [ 'shape' => 'UntagResourceRequest', ], 'name' => 'UntagResource', ], ], 'shapes' => [ 'AvailSuppression' => [ 'type' => 'structure', 'members' => [ 'Mode' => [ 'shape' => 'Mode', ], 'Value' => [ 'shape' => '__string', ], ], ], 'BadRequestException' => [ 'error' => [ 'httpStatusCode' => 400, ], 'exception' => true, 'members' => [ 'Message' => [ 'shape' => '__string', ], ], 'type' => 'structure', ], 'Bumper' => [ 'type' => 'structure', 'members' => [ 'EndUrl' => [ 'shape' => '__string', ], 'StartUrl' => [ 'shape' => '__string', ], ], ], 'CdnConfiguration' => [ 'members' => [ 'AdSegmentUrlPrefix' => [ 'shape' => '__string', ], 'ContentSegmentUrlPrefix' => [ 'shape' => '__string', ], ], 'type' => 'structure', ], 'DashConfiguration' => [ 'members' => [ 'ManifestEndpointPrefix' => [ 'shape' => '__string', ], 'MpdLocation' => [ 'shape' => '__string', ], 'OriginManifestType' => [ 'shape' => 'OriginManifestType', ], ], 'type' => 'structure', ], 'DashConfigurationForPut' => [ 'members' => [ 'MpdLocation' => [ 'shape' => '__string', ], 'OriginManifestType' => [ 'shape' => 'OriginManifestType', ], ], 'type' => 'structure', ], 'DeletePlaybackConfigurationRequest' => [ 'members' => [ 'Name' => [ 'location' => 'uri', 'locationName' => 'Name', 'shape' => '__string', ], ], 'required' => [ 'Name', ], 'type' => 'structure', ], 'DeletePlaybackConfigurationResponse' => [ 'members' => [], 'type' => 'structure', ], 'GetPlaybackConfigurationRequest' => [ 'members' => [ 'Name' => [ 'location' => 'uri', 'locationName' => 'Name', 'shape' => '__string', ], ], 'required' => [ 'Name', ], 'type' => 'structure', ], 'GetPlaybackConfigurationResponse' => [ 'members' => [ 'AdDecisionServerUrl' => [ 'shape' => '__string', ], 'AvailSuppression' => [ 'shape' => 'AvailSuppression', ], 'Bumper' => [ 'shape' => 'Bumper', ], 'CdnConfiguration' => [ 'shape' => 'CdnConfiguration', ], 'PersonalizationThresholdSeconds' => [ 'shape' => '__integerMin1', ], 'DashConfiguration' => [ 'shape' => 'DashConfiguration', ], 'HlsConfiguration' => [ 'shape' => 'HlsConfiguration', ], 'LivePreRollConfiguration' => [ 'shape' => 'LivePreRollConfiguration', ], 'Name' => [ 'shape' => '__string', ], 'PlaybackConfigurationArn' => [ 'shape' => '__string', ], 'PlaybackEndpointPrefix' => [ 'shape' => '__string', ], 'SessionInitializationEndpointPrefix' => [ 'shape' => '__string', ], 'SlateAdUrl' => [ 'shape' => '__string', ], 'Tags' => [ 'locationName' => 'tags', 'shape' => '__mapOf__string', ], 'TranscodeProfileName' => [ 'shape' => '__string', ], 'VideoContentSourceUrl' => [ 'shape' => '__string', ], ], 'type' => 'structure', ], 'HlsConfiguration' => [ 'members' => [ 'ManifestEndpointPrefix' => [ 'shape' => '__string', ], ], 'type' => 'structure', ], 'ListPlaybackConfigurationsRequest' => [ 'members' => [ 'MaxResults' => [ 'location' => 'querystring', 'locationName' => 'MaxResults', 'shape' => '__integerMin1Max100', ], 'NextToken' => [ 'location' => 'querystring', 'locationName' => 'NextToken', 'shape' => '__string', ], ], 'type' => 'structure', ], 'ListPlaybackConfigurationsResponse' => [ 'members' => [ 'Items' => [ 'shape' => '__listOfPlaybackConfigurations', ], 'NextToken' => [ 'shape' => '__string', ], ], 'type' => 'structure', ], 'ListTagsForResourceRequest' => [ 'members' => [ 'ResourceArn' => [ 'location' => 'uri', 'locationName' => 'ResourceArn', 'shape' => '__string', ], ], 'required' => [ 'ResourceArn', ], 'type' => 'structure', ], 'ListTagsForResourceResponse' => [ 'members' => [ 'Tags' => [ 'locationName' => 'tags', 'shape' => '__mapOf__string', ], ], 'type' => 'structure', ], 'OriginManifestType' => [ 'enum' => [ 'SINGLE_PERIOD', 'MULTI_PERIOD', ], 'type' => 'string', ], 'Mode' => [ 'enum' => [ 'OFF', 'BEHIND_LIVE_EDGE', ], 'type' => 'string', ], 'PlaybackConfiguration' => [ 'members' => [ 'AdDecisionServerUrl' => [ 'shape' => '__string', ], 'CdnConfiguration' => [ 'shape' => 'CdnConfiguration', ], 'PersonalizationThresholdSeconds' => [ 'shape' => '__integerMin1', ], 'DashConfiguration' => [ 'shape' => 'DashConfiguration', ], 'HlsConfiguration' => [ 'shape' => 'HlsConfiguration', ], 'Name' => [ 'shape' => '__string', ], 'PlaybackConfigurationArn' => [ 'shape' => '__string', ], 'PlaybackEndpointPrefix' => [ 'shape' => '__string', ], 'SessionInitializationEndpointPrefix' => [ 'shape' => '__string', ], 'SlateAdUrl' => [ 'shape' => '__string', ], 'Tags' => [ 'locationName' => 'tags', 'shape' => '__mapOf__string', ], 'TranscodeProfileName' => [ 'shape' => '__string', ], 'VideoContentSourceUrl' => [ 'shape' => '__string', ], ], 'type' => 'structure', ], 'LivePreRollConfiguration' => [ 'type' => 'structure', 'members' => [ 'AdDecisionServerUrl' => [ 'shape' => '__string', ], 'MaxDurationSeconds' => [ 'shape' => '__integer', ], ], ], 'PutPlaybackConfigurationRequest' => [ 'members' => [ 'AdDecisionServerUrl' => [ 'shape' => '__string', ], 'AvailSuppression' => [ 'shape' => 'AvailSuppression', ], 'Bumper' => [ 'shape' => 'Bumper', ], 'CdnConfiguration' => [ 'shape' => 'CdnConfiguration', ], 'PersonalizationThresholdSeconds' => [ 'shape' => '__integerMin1', ], 'DashConfiguration' => [ 'shape' => 'DashConfigurationForPut', ], 'LivePreRollConfiguration' => [ 'shape' => 'LivePreRollConfiguration', ], 'Name' => [ 'shape' => '__string', ], 'SlateAdUrl' => [ 'shape' => '__string', ], 'Tags' => [ 'locationName' => 'tags', 'shape' => '__mapOf__string', ], 'TranscodeProfileName' => [ 'shape' => '__string', ], 'VideoContentSourceUrl' => [ 'shape' => '__string', ], ], 'type' => 'structure', ], 'PutPlaybackConfigurationResponse' => [ 'members' => [ 'AdDecisionServerUrl' => [ 'shape' => '__string', ], 'AvailSuppression' => [ 'shape' => 'AvailSuppression', ], 'Bumper' => [ 'shape' => 'Bumper', ], 'CdnConfiguration' => [ 'shape' => 'CdnConfiguration', ], 'DashConfiguration' => [ 'shape' => 'DashConfiguration', ], 'HlsConfiguration' => [ 'shape' => 'HlsConfiguration', ], 'LivePreRollConfiguration' => [ 'shape' => 'LivePreRollConfiguration', ], 'Name' => [ 'shape' => '__string', ], 'PlaybackConfigurationArn' => [ 'shape' => '__string', ], 'PlaybackEndpointPrefix' => [ 'shape' => '__string', ], 'SessionInitializationEndpointPrefix' => [ 'shape' => '__string', ], 'SlateAdUrl' => [ 'shape' => '__string', ], 'Tags' => [ 'locationName' => 'tags', 'shape' => '__mapOf__string', ], 'TranscodeProfileName' => [ 'shape' => '__string', ], 'VideoContentSourceUrl' => [ 'shape' => '__string', ], ], 'type' => 'structure', ], 'TagResourceRequest' => [ 'members' => [ 'ResourceArn' => [ 'location' => 'uri', 'locationName' => 'ResourceArn', 'shape' => '__string', ], 'Tags' => [ 'locationName' => 'tags', 'shape' => '__mapOf__string', ], ], 'required' => [ 'ResourceArn', 'Tags', ], 'type' => 'structure', ], 'TagsModel' => [ 'members' => [ 'Tags' => [ 'locationName' => 'tags', 'shape' => '__mapOf__string', ], ], 'required' => [ 'Tags', ], 'type' => 'structure', ], 'UntagResourceRequest' => [ 'members' => [ 'ResourceArn' => [ 'location' => 'uri', 'locationName' => 'ResourceArn', 'shape' => '__string', ], 'TagKeys' => [ 'location' => 'querystring', 'locationName' => 'tagKeys', 'shape' => '__listOf__string', ], ], 'required' => [ 'ResourceArn', 'TagKeys', ], 'type' => 'structure', ], '__boolean' => [ 'type' => 'boolean', ], '__double' => [ 'type' => 'double', ], '__integer' => [ 'type' => 'integer', ], '__integerMin1' => [ 'type' => 'integer', 'min' => 1, ], '__integerMin1Max100' => [ 'max' => 100, 'min' => 1, 'type' => 'integer', ], '__listOfPlaybackConfigurations' => [ 'member' => [ 'shape' => 'PlaybackConfiguration', ], 'type' => 'list', ], '__listOf__string' => [ 'member' => [ 'shape' => '__string', ], 'type' => 'list', ], '__long' => [ 'type' => 'long', ], '__mapOf__string' => [ 'key' => [ 'shape' => '__string', ], 'type' => 'map', 'value' => [ 'shape' => '__string', ], ], '__string' => [ 'type' => 'string', ], '__timestampIso8601' => [ 'timestampFormat' => 'iso8601', 'type' => 'timestamp', ], '__timestampUnix' => [ 'timestampFormat' => 'unixTimestamp', 'type' => 'timestamp', ], ],];
