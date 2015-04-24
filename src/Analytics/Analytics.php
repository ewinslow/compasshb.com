<?php namespace CompassHB\Analytics;

interface Analytics
{
    public function getPageViews($path, $startDate, $endDate);
    public function getActiveUsers();
}
