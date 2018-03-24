<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Microsoft\Graph\Exception\GraphException;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;

class OutlookController extends Controller
{
    public function calendar()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $tokenCache = new \App\TokenStore\TokenCache;

        $graph = new Graph();
        $graph->setAccessToken($tokenCache->getAccessToken());

        $user = $graph->createRequest('GET', '/me')
            ->setReturnType(Model\User::class)
            ->execute();

        $eventsQueryParams = array (
            // // Only return Subject, Start, and End fields
            "\$select" => "subject,start,end",
            // Sort by Start, oldest first
            "\$orderby" => "End/DateTime",
            // Return at most 10 results
            "\$top" => "10"
        );
        $event = array(
                'subject' => '',
                'start' => array(
                    'dateTime' => '',
                    'timeZone' => 'America/Indiana/Indianapolis'),
                'end' => array(
                    'dateTime' => '',
                    'timeZone' => 'America/Indiana/Indianapolis'),
                'location' => array(
                    'displayName' => '',
                    'address' => null
                ),
                'showAs' => 'Busy',
                'isReminderOn' => false,
                'recurrence' => array(
                    'pattern' => array(
                        'type' => 'Weekly',
                        'interval' => 1,
                        'daysOfWeek' => array(),
                        'firstDayOfWeek' => '',
                    ),
                    'range' => array(
                        'type' => 'EndDate',
                        'startDate' => '',
                        'endDate' => ''
                    ),
                ),
        );

        $eventList = array();

        if ($_POST["unistart"] != null) {
            $event['recurrence']['range']['startDate'] = $_POST["unistart"];
        }
        if ($_POST["uniend"] != null) {
            $event['recurrence']['range']['endDate'] = $_POST["uniend"];
        }

        for ($i = 1; $i < 7; $i++) {
            $temp_event = $event;
            if($_POST["class".$i] != null &&
                $_POST["start".$i] != null &&
                $_POST["end".$i] != null &&
                $this->weekCheck($i) &&
                $this->dateCheck($i)) {

                $temp_event['subject'] = $_POST["class".$i];
                $temp_event['start']['dateTime'] =
                    ($_POST['dstart'.$i] != null ? $_POST['dstart'.$i]."T".$_POST["start".$i].":00" :
                        $_POST["unistart"]."T".$_POST["start".$i].":00");
                $temp_event['end']['dateTime'] =
                    
                    ($_POST['dstart'.$i] != null ? $_POST['dstart'.$i]."T".$_POST["end".$i].":00" :
                        $_POST["unistart"]."T".$_POST["end".$i].":00");
                $temp_event['location']['displayName'] = $_POST["location".$i];
                $temp_event['recurrence']['pattern']['daysOfWeek'] = $_POST["days".$i];
                $temp_event['recurrence']['pattern']['firstDayOfWeek'] = $_POST["days".$i][0];
                $temp_event['recurrence']['range']['startDate'] =
                    ($_POST['dstart'.$i] != null ? $_POST['dstart'.$i] : $_POST["unistart"]);
                $temp_event['recurrence']['range']['endDate'] =
                    ($_POST['dend'.$i] != null ? $_POST['dend'.$i] : $_POST["uniend"]);


                try {
                    $events = $graph->createRequest('POST', '/me/events')
                        ->addHeaders(array("Content-Type" => "application/json"))
                        ->attachBody($temp_event)
                        ->setReturnType(Model\Event::class)
                        ->execute();
                    array_push($eventList, $events);
                } catch (GraphException $e) {
                    echo "Sorry, your request could not be fulfilled";
                }
            }


        }

        return view('result', array(
            'events' => $eventList
        ));
    }

    function weekCheck($index) {
        try {
            return is_array($_POST['days'.$index]);
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    function dateCheck($index) {
        return ($_POST["unistart"] || $_POST["dstart".$index]) && ($_POST["uniend"] || $_POST["dend".$index]);
    }
}