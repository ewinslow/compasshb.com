<?php
namespace CompassHB\Analytics;

use CompassHB\Google\AnalyticsInterface;

class FakeAnalytics implements AnalyticsInterface
{
    public function getPageViews($path, $startDate, $endDate) {
        return [
            'sessions' => 3,
            'avgSessionDuration' => 5000,
        ];
    }
    
    public function getActiveUsers() {
        return 134; 
    }
}
