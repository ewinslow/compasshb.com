<?php
namespace CompassHB\Ccb;

use GuzzleHttp\Client;

class Events
{
    /** @var Client */
    private $client;

    /**
     * @param Client $client
     */
    public function __construct(GuzzleHttp\Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param int    $id
     * @param int    $event_id
     * @param string $status   Must be one of the following: ‘add’; ‘invite’; ‘decline’; ‘maybe’; ‘request’
     *
     * @return ...
     */
    public function addIndividualToEvent($id, $eventId, $status)
    {
        return $this->client->srv('add_individual_to_event', [
            'id' => $id,
            'eventId' => $eventId,
            'status' => $status,
        ], 'POST');
    }

    /**
     * @param int      $id
     * @param DateTime $occurrence
     *
     * @return ...
     */
    public function attendanceProfile($id, DateTime $occurrence)
    {
        return $this->client->srv('attendance_profile', [
            'id' => $id,
            'occurrence' => $occurrence, // TODO(evan): Convert to correctly-formatted string
        ]);
    }

    /**
     * Create a new event in the Church Community Builder system.
     *
     * @param int      $groupId
     * @param DateTime $startDate
     * @param DateTime $endDate
     * @param array    $options
     *
     * @return ... The profile of the event that was created.
     */
    public function createEvent($groupId, DateTime $startDate, DateTime $endDate, $name, array $options = [])
    {
        $options['groupId'] = $groupId;
        $options['startDate'] = $startDate; // TODO(evan): Convert date to string
        $options['endDate'] = $endDate; // TODO(evan): Convert date to string
        $options['name'] = $name;

        return $this->client->srv('create_event', $options, 'POST');
    }

    /**
     * Retrieve the profile for an event identified by its ID.
     *
     * @param int $id
     *
     * @return ...
     */
    public function eventProfile($id)
    {
        return $this->client->srv('event_profile', [
            'id' => $id,
        ]);
    }

    /**
     * Get all events created or modified since the given date.
     *
     * If a date is not provided, all events in the system will be returned.
     *
     * @param DateTime $modifiedSince
     *
     * @return ...
     */
    public function eventProfiles(DateTime $modifiedSince = null)
    {
        return $this->client->srv('event_profiles', [
            'modified_since' => $modifiedSince,
        ]);
    }
}
