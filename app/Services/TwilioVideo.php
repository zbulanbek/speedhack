<?php


namespace App\Services;


use Illuminate\Http\Request;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;
use Twilio\Rest\Client;

class TwilioVideo
{
    public static function generateRoomAccessToken($roomName, $userId)
    {
        // Substitute your Twilio Account SID and API Key details
        $accountSid = config('services.twilio_video.account_sid');
        $apiKeySid = config('services.twilio_video.key_sid');
        $apiKeySecret = config('services.twilio_video.key_secret');

        // Create an Access Token
        $token = new AccessToken(
            $accountSid,
            $apiKeySid,
            $apiKeySecret,
            42000,
            $userId
        );

        // Grant access to Video
        $grant = new VideoGrant();
        $grant->setRoom($roomName);
        $token->addGrant($grant);

        // Serialize the token as a JWT
        return $token->toJWT();
    }

    /**
     * @param $room_name
     * @throws ConfigurationException
     * @throws \Twilio\Exceptions\TwilioException
     */
    public function createRoom($room_name): void
    {
        $accountSid = config('services.twilio_video.account_sid');
        $accountToken = config('services.twilio_video.account_token');
        try {
            $client = new Client($accountSid, $accountToken);
            $exists = $client->video->rooms->read([ 'uniqueName' => $room_name]);

            if (empty($exists)) {
                $client->video->rooms->create([
                    'uniqueName' => $room_name,
                    'type' => 'group',
                    'recordParticipantsOnConnect' => false
                ]);
            }
        } catch (ConfigurationException $e) {
            throw $e;
        }
    }
}
