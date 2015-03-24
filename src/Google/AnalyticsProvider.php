<?php namespace CompassHB\Google;

interface AnalyticsProvider
{
    public function getPageViews($path, $startDate, $endDate);
    public function getActiveUsers();
}
