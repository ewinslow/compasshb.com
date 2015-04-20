<?php namespace CompassHB\Google;

interface AnalyticsInterface
{
    public function getPageViews($path, $startDate, $endDate);
    public function getActiveUsers();
}
