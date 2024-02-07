<?php
/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Voice
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Twilio\Rest\Voice\V1;

use Twilio\Options;
use Twilio\Values;

abstract class ByocTrunkOptions
{
    /**
     * @param string $friendlyName A descriptive string that you create to describe the resource. It is not unique and can be up to 255 characters long.
     * @param string $voiceUrl The URL we should call when the BYOC Trunk receives a call.
     * @param string $voiceMethod The HTTP method we should use to call `voice_url`. Can be: `GET` or `POST`.
     * @param string $voiceFallbackUrl The URL that we should call when an error occurs while retrieving or executing the TwiML from `voice_url`.
     * @param string $voiceFallbackMethod The HTTP method we should use to call `voice_fallback_url`. Can be: `GET` or `POST`.
     * @param string $statusCallbackUrl The URL that we should call to pass status parameters (such as call ended) to your application.
     * @param string $statusCallbackMethod The HTTP method we should use to call `status_callback_url`. Can be: `GET` or `POST`.
     * @param bool $cnamLookupEnabled Whether Caller ID Name (CNAM) lookup is enabled for the trunk. If enabled, all inbound calls to the BYOC Trunk from the United States and Canada automatically perform a CNAM Lookup and display Caller ID data on your phone. See [CNAM Lookups](https://www.twilio.com/docs/sip-trunking#CNAM) for more information.
     * @param string $connectionPolicySid The SID of the Connection Policy that Twilio will use when routing traffic to your communications infrastructure.
     * @param string $fromDomainSid The SID of the SIP Domain that should be used in the `From` header of originating calls sent to your SIP infrastructure. If your SIP infrastructure allows users to \\\"call back\\\" an incoming call, configure this with a [SIP Domain](https://www.twilio.com/docs/voice/api/sending-sip) to ensure proper routing. If not configured, the from domain will default to \\\"sip.twilio.com\\\".
     * @return CreateByocTrunkOptions Options builder
     */
    public static function create(
        
        string $friendlyName = Values::NONE,
        string $voiceUrl = Values::NONE,
        string $voiceMethod = Values::NONE,
        string $voiceFallbackUrl = Values::NONE,
        string $voiceFallbackMethod = Values::NONE,
        string $statusCallbackUrl = Values::NONE,
        string $statusCallbackMethod = Values::NONE,
        bool $cnamLookupEnabled = Values::BOOL_NONE,
        string $connectionPolicySid = Values::NONE,
        string $fromDomainSid = Values::NONE

    ): CreateByocTrunkOptions
    {
        return new CreateByocTrunkOptions(
            $friendlyName,
            $voiceUrl,
            $voiceMethod,
            $voiceFallbackUrl,
            $voiceFallbackMethod,
            $statusCallbackUrl,
            $statusCallbackMethod,
            $cnamLookupEnabled,
            $connectionPolicySid,
            $fromDomainSid
        );
    }




    /**
     * @param string $friendlyName A descriptive string that you create to describe the resource. It is not unique and can be up to 255 characters long.
     * @param string $voiceUrl The URL we should call when the BYOC Trunk receives a call.
     * @param string $voiceMethod The HTTP method we should use to call `voice_url`
     * @param string $voiceFallbackUrl The URL that we should call when an error occurs while retrieving or executing the TwiML requested by `voice_url`.
     * @param string $voiceFallbackMethod The HTTP method we should use to call `voice_fallback_url`. Can be: `GET` or `POST`.
     * @param string $statusCallbackUrl The URL that we should call to pass status parameters (such as call ended) to your application.
     * @param string $statusCallbackMethod The HTTP method we should use to call `status_callback_url`. Can be: `GET` or `POST`.
     * @param bool $cnamLookupEnabled Whether Caller ID Name (CNAM) lookup is enabled for the trunk. If enabled, all inbound calls to the BYOC Trunk from the United States and Canada automatically perform a CNAM Lookup and display Caller ID data on your phone. See [CNAM Lookups](https://www.twilio.com/docs/sip-trunking#CNAM) for more information.
     * @param string $connectionPolicySid The SID of the Connection Policy that Twilio will use when routing traffic to your communications infrastructure.
     * @param string $fromDomainSid The SID of the SIP Domain that should be used in the `From` header of originating calls sent to your SIP infrastructure. If your SIP infrastructure allows users to \\\"call back\\\" an incoming call, configure this with a [SIP Domain](https://www.twilio.com/docs/voice/api/sending-sip) to ensure proper routing. If not configured, the from domain will default to \\\"sip.twilio.com\\\".
     * @return UpdateByocTrunkOptions Options builder
     */
    public static function update(
        
        string $friendlyName = Values::NONE,
        string $voiceUrl = Values::NONE,
        string $voiceMethod = Values::NONE,
        string $voiceFallbackUrl = Values::NONE,
        string $voiceFallbackMethod = Values::NONE,
        string $statusCallbackUrl = Values::NONE,
        string $statusCallbackMethod = Values::NONE,
        bool $cnamLookupEnabled = Values::BOOL_NONE,
        string $connectionPolicySid = Values::NONE,
        string $fromDomainSid = Values::NONE

    ): UpdateByocTrunkOptions
    {
        return new UpdateByocTrunkOptions(
            $friendlyName,
            $voiceUrl,
            $voiceMethod,
            $voiceFallbackUrl,
            $voiceFallbackMethod,
            $statusCallbackUrl,
            $statusCallbackMethod,
            $cnamLookupEnabled,
            $connectionPolicySid,
            $fromDomainSid
        );
    }

}

class CreateByocTrunkOptions extends Options
    {
    /**
     * @param string $friendlyName A descriptive string that you create to describe the resource. It is not unique and can be up to 255 characters long.
     * @param string $voiceUrl The URL we should call when the BYOC Trunk receives a call.
     * @param string $voiceMethod The HTTP method we should use to call `voice_url`. Can be: `GET` or `POST`.
     * @param string $voiceFallbackUrl The URL that we should call when an error occurs while retrieving or executing the TwiML from `voice_url`.
     * @param string $voiceFallbackMethod The HTTP method we should use to call `voice_fallback_url`. Can be: `GET` or `POST`.
     * @param string $statusCallbackUrl The URL that we should call to pass status parameters (such as call ended) to your application.
     * @param string $statusCallbackMethod The HTTP method we should use to call `status_callback_url`. Can be: `GET` or `POST`.
     * @param bool $cnamLookupEnabled Whether Caller ID Name (CNAM) lookup is enabled for the trunk. If enabled, all inbound calls to the BYOC Trunk from the United States and Canada automatically perform a CNAM Lookup and display Caller ID data on your phone. See [CNAM Lookups](https://www.twilio.com/docs/sip-trunking#CNAM) for more information.
     * @param string $connectionPolicySid The SID of the Connection Policy that Twilio will use when routing traffic to your communications infrastructure.
     * @param string $fromDomainSid The SID of the SIP Domain that should be used in the `From` header of originating calls sent to your SIP infrastructure. If your SIP infrastructure allows users to \\\"call back\\\" an incoming call, configure this with a [SIP Domain](https://www.twilio.com/docs/voice/api/sending-sip) to ensure proper routing. If not configured, the from domain will default to \\\"sip.twilio.com\\\".
     */
    public function __construct(
        
        string $friendlyName = Values::NONE,
        string $voiceUrl = Values::NONE,
        string $voiceMethod = Values::NONE,
        string $voiceFallbackUrl = Values::NONE,
        string $voiceFallbackMethod = Values::NONE,
        string $statusCallbackUrl = Values::NONE,
        string $statusCallbackMethod = Values::NONE,
        bool $cnamLookupEnabled = Values::BOOL_NONE,
        string $connectionPolicySid = Values::NONE,
        string $fromDomainSid = Values::NONE

    ) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['voiceUrl'] = $voiceUrl;
        $this->options['voiceMethod'] = $voiceMethod;
        $this->options['voiceFallbackUrl'] = $voiceFallbackUrl;
        $this->options['voiceFallbackMethod'] = $voiceFallbackMethod;
        $this->options['statusCallbackUrl'] = $statusCallbackUrl;
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
        $this->options['cnamLookupEnabled'] = $cnamLookupEnabled;
        $this->options['connectionPolicySid'] = $connectionPolicySid;
        $this->options['fromDomainSid'] = $fromDomainSid;
    }

    /**
     * A descriptive string that you create to describe the resource. It is not unique and can be up to 255 characters long.
     *
     * @param string $friendlyName A descriptive string that you create to describe the resource. It is not unique and can be up to 255 characters long.
     * @return $this Fluent Builder
     */
    public function setFriendlyName(string $friendlyName): self
    {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * The URL we should call when the BYOC Trunk receives a call.
     *
     * @param string $voiceUrl The URL we should call when the BYOC Trunk receives a call.
     * @return $this Fluent Builder
     */
    public function setVoiceUrl(string $voiceUrl): self
    {
        $this->options['voiceUrl'] = $voiceUrl;
        return $this;
    }

    /**
     * The HTTP method we should use to call `voice_url`. Can be: `GET` or `POST`.
     *
     * @param string $voiceMethod The HTTP method we should use to call `voice_url`. Can be: `GET` or `POST`.
     * @return $this Fluent Builder
     */
    public function setVoiceMethod(string $voiceMethod): self
    {
        $this->options['voiceMethod'] = $voiceMethod;
        return $this;
    }

    /**
     * The URL that we should call when an error occurs while retrieving or executing the TwiML from `voice_url`.
     *
     * @param string $voiceFallbackUrl The URL that we should call when an error occurs while retrieving or executing the TwiML from `voice_url`.
     * @return $this Fluent Builder
     */
    public function setVoiceFallbackUrl(string $voiceFallbackUrl): self
    {
        $this->options['voiceFallbackUrl'] = $voiceFallbackUrl;
        return $this;
    }

    /**
     * The HTTP method we should use to call `voice_fallback_url`. Can be: `GET` or `POST`.
     *
     * @param string $voiceFallbackMethod The HTTP method we should use to call `voice_fallback_url`. Can be: `GET` or `POST`.
     * @return $this Fluent Builder
     */
    public function setVoiceFallbackMethod(string $voiceFallbackMethod): self
    {
        $this->options['voiceFallbackMethod'] = $voiceFallbackMethod;
        return $this;
    }

    /**
     * The URL that we should call to pass status parameters (such as call ended) to your application.
     *
     * @param string $statusCallbackUrl The URL that we should call to pass status parameters (such as call ended) to your application.
     * @return $this Fluent Builder
     */
    public function setStatusCallbackUrl(string $statusCallbackUrl): self
    {
        $this->options['statusCallbackUrl'] = $statusCallbackUrl;
        return $this;
    }

    /**
     * The HTTP method we should use to call `status_callback_url`. Can be: `GET` or `POST`.
     *
     * @param string $statusCallbackMethod The HTTP method we should use to call `status_callback_url`. Can be: `GET` or `POST`.
     * @return $this Fluent Builder
     */
    public function setStatusCallbackMethod(string $statusCallbackMethod): self
    {
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
        return $this;
    }

    /**
     * Whether Caller ID Name (CNAM) lookup is enabled for the trunk. If enabled, all inbound calls to the BYOC Trunk from the United States and Canada automatically perform a CNAM Lookup and display Caller ID data on your phone. See [CNAM Lookups](https://www.twilio.com/docs/sip-trunking#CNAM) for more information.
     *
     * @param bool $cnamLookupEnabled Whether Caller ID Name (CNAM) lookup is enabled for the trunk. If enabled, all inbound calls to the BYOC Trunk from the United States and Canada automatically perform a CNAM Lookup and display Caller ID data on your phone. See [CNAM Lookups](https://www.twilio.com/docs/sip-trunking#CNAM) for more information.
     * @return $this Fluent Builder
     */
    public function setCnamLookupEnabled(bool $cnamLookupEnabled): self
    {
        $this->options['cnamLookupEnabled'] = $cnamLookupEnabled;
        return $this;
    }

    /**
     * The SID of the Connection Policy that Twilio will use when routing traffic to your communications infrastructure.
     *
     * @param string $connectionPolicySid The SID of the Connection Policy that Twilio will use when routing traffic to your communications infrastructure.
     * @return $this Fluent Builder
     */
    public function setConnectionPolicySid(string $connectionPolicySid): self
    {
        $this->options['connectionPolicySid'] = $connectionPolicySid;
        return $this;
    }

    /**
     * The SID of the SIP Domain that should be used in the `From` header of originating calls sent to your SIP infrastructure. If your SIP infrastructure allows users to \\\"call back\\\" an incoming call, configure this with a [SIP Domain](https://www.twilio.com/docs/voice/api/sending-sip) to ensure proper routing. If not configured, the from domain will default to \\\"sip.twilio.com\\\".
     *
     * @param string $fromDomainSid The SID of the SIP Domain that should be used in the `From` header of originating calls sent to your SIP infrastructure. If your SIP infrastructure allows users to \\\"call back\\\" an incoming call, configure this with a [SIP Domain](https://www.twilio.com/docs/voice/api/sending-sip) to ensure proper routing. If not configured, the from domain will default to \\\"sip.twilio.com\\\".
     * @return $this Fluent Builder
     */
    public function setFromDomainSid(string $fromDomainSid): self
    {
        $this->options['fromDomainSid'] = $fromDomainSid;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Voice.V1.CreateByocTrunkOptions ' . $options . ']';
    }
}




class UpdateByocTrunkOptions extends Options
    {
    /**
     * @param string $friendlyName A descriptive string that you create to describe the resource. It is not unique and can be up to 255 characters long.
     * @param string $voiceUrl The URL we should call when the BYOC Trunk receives a call.
     * @param string $voiceMethod The HTTP method we should use to call `voice_url`
     * @param string $voiceFallbackUrl The URL that we should call when an error occurs while retrieving or executing the TwiML requested by `voice_url`.
     * @param string $voiceFallbackMethod The HTTP method we should use to call `voice_fallback_url`. Can be: `GET` or `POST`.
     * @param string $statusCallbackUrl The URL that we should call to pass status parameters (such as call ended) to your application.
     * @param string $statusCallbackMethod The HTTP method we should use to call `status_callback_url`. Can be: `GET` or `POST`.
     * @param bool $cnamLookupEnabled Whether Caller ID Name (CNAM) lookup is enabled for the trunk. If enabled, all inbound calls to the BYOC Trunk from the United States and Canada automatically perform a CNAM Lookup and display Caller ID data on your phone. See [CNAM Lookups](https://www.twilio.com/docs/sip-trunking#CNAM) for more information.
     * @param string $connectionPolicySid The SID of the Connection Policy that Twilio will use when routing traffic to your communications infrastructure.
     * @param string $fromDomainSid The SID of the SIP Domain that should be used in the `From` header of originating calls sent to your SIP infrastructure. If your SIP infrastructure allows users to \\\"call back\\\" an incoming call, configure this with a [SIP Domain](https://www.twilio.com/docs/voice/api/sending-sip) to ensure proper routing. If not configured, the from domain will default to \\\"sip.twilio.com\\\".
     */
    public function __construct(
        
        string $friendlyName = Values::NONE,
        string $voiceUrl = Values::NONE,
        string $voiceMethod = Values::NONE,
        string $voiceFallbackUrl = Values::NONE,
        string $voiceFallbackMethod = Values::NONE,
        string $statusCallbackUrl = Values::NONE,
        string $statusCallbackMethod = Values::NONE,
        bool $cnamLookupEnabled = Values::BOOL_NONE,
        string $connectionPolicySid = Values::NONE,
        string $fromDomainSid = Values::NONE

    ) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['voiceUrl'] = $voiceUrl;
        $this->options['voiceMethod'] = $voiceMethod;
        $this->options['voiceFallbackUrl'] = $voiceFallbackUrl;
        $this->options['voiceFallbackMethod'] = $voiceFallbackMethod;
        $this->options['statusCallbackUrl'] = $statusCallbackUrl;
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
        $this->options['cnamLookupEnabled'] = $cnamLookupEnabled;
        $this->options['connectionPolicySid'] = $connectionPolicySid;
        $this->options['fromDomainSid'] = $fromDomainSid;
    }

    /**
     * A descriptive string that you create to describe the resource. It is not unique and can be up to 255 characters long.
     *
     * @param string $friendlyName A descriptive string that you create to describe the resource. It is not unique and can be up to 255 characters long.
     * @return $this Fluent Builder
     */
    public function setFriendlyName(string $friendlyName): self
    {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * The URL we should call when the BYOC Trunk receives a call.
     *
     * @param string $voiceUrl The URL we should call when the BYOC Trunk receives a call.
     * @return $this Fluent Builder
     */
    public function setVoiceUrl(string $voiceUrl): self
    {
        $this->options['voiceUrl'] = $voiceUrl;
        return $this;
    }

    /**
     * The HTTP method we should use to call `voice_url`
     *
     * @param string $voiceMethod The HTTP method we should use to call `voice_url`
     * @return $this Fluent Builder
     */
    public function setVoiceMethod(string $voiceMethod): self
    {
        $this->options['voiceMethod'] = $voiceMethod;
        return $this;
    }

    /**
     * The URL that we should call when an error occurs while retrieving or executing the TwiML requested by `voice_url`.
     *
     * @param string $voiceFallbackUrl The URL that we should call when an error occurs while retrieving or executing the TwiML requested by `voice_url`.
     * @return $this Fluent Builder
     */
    public function setVoiceFallbackUrl(string $voiceFallbackUrl): self
    {
        $this->options['voiceFallbackUrl'] = $voiceFallbackUrl;
        return $this;
    }

    /**
     * The HTTP method we should use to call `voice_fallback_url`. Can be: `GET` or `POST`.
     *
     * @param string $voiceFallbackMethod The HTTP method we should use to call `voice_fallback_url`. Can be: `GET` or `POST`.
     * @return $this Fluent Builder
     */
    public function setVoiceFallbackMethod(string $voiceFallbackMethod): self
    {
        $this->options['voiceFallbackMethod'] = $voiceFallbackMethod;
        return $this;
    }

    /**
     * The URL that we should call to pass status parameters (such as call ended) to your application.
     *
     * @param string $statusCallbackUrl The URL that we should call to pass status parameters (such as call ended) to your application.
     * @return $this Fluent Builder
     */
    public function setStatusCallbackUrl(string $statusCallbackUrl): self
    {
        $this->options['statusCallbackUrl'] = $statusCallbackUrl;
        return $this;
    }

    /**
     * The HTTP method we should use to call `status_callback_url`. Can be: `GET` or `POST`.
     *
     * @param string $statusCallbackMethod The HTTP method we should use to call `status_callback_url`. Can be: `GET` or `POST`.
     * @return $this Fluent Builder
     */
    public function setStatusCallbackMethod(string $statusCallbackMethod): self
    {
        $this->options['statusCallbackMethod'] = $statusCallbackMethod;
        return $this;
    }

    /**
     * Whether Caller ID Name (CNAM) lookup is enabled for the trunk. If enabled, all inbound calls to the BYOC Trunk from the United States and Canada automatically perform a CNAM Lookup and display Caller ID data on your phone. See [CNAM Lookups](https://www.twilio.com/docs/sip-trunking#CNAM) for more information.
     *
     * @param bool $cnamLookupEnabled Whether Caller ID Name (CNAM) lookup is enabled for the trunk. If enabled, all inbound calls to the BYOC Trunk from the United States and Canada automatically perform a CNAM Lookup and display Caller ID data on your phone. See [CNAM Lookups](https://www.twilio.com/docs/sip-trunking#CNAM) for more information.
     * @return $this Fluent Builder
     */
    public function setCnamLookupEnabled(bool $cnamLookupEnabled): self
    {
        $this->options['cnamLookupEnabled'] = $cnamLookupEnabled;
        return $this;
    }

    /**
     * The SID of the Connection Policy that Twilio will use when routing traffic to your communications infrastructure.
     *
     * @param string $connectionPolicySid The SID of the Connection Policy that Twilio will use when routing traffic to your communications infrastructure.
     * @return $this Fluent Builder
     */
    public function setConnectionPolicySid(string $connectionPolicySid): self
    {
        $this->options['connectionPolicySid'] = $connectionPolicySid;
        return $this;
    }

    /**
     * The SID of the SIP Domain that should be used in the `From` header of originating calls sent to your SIP infrastructure. If your SIP infrastructure allows users to \\\"call back\\\" an incoming call, configure this with a [SIP Domain](https://www.twilio.com/docs/voice/api/sending-sip) to ensure proper routing. If not configured, the from domain will default to \\\"sip.twilio.com\\\".
     *
     * @param string $fromDomainSid The SID of the SIP Domain that should be used in the `From` header of originating calls sent to your SIP infrastructure. If your SIP infrastructure allows users to \\\"call back\\\" an incoming call, configure this with a [SIP Domain](https://www.twilio.com/docs/voice/api/sending-sip) to ensure proper routing. If not configured, the from domain will default to \\\"sip.twilio.com\\\".
     * @return $this Fluent Builder
     */
    public function setFromDomainSid(string $fromDomainSid): self
    {
        $this->options['fromDomainSid'] = $fromDomainSid;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Voice.V1.UpdateByocTrunkOptions ' . $options . ']';
    }
}

