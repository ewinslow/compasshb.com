<?php
namespace CompassHB\Analytics;

class FakeAnalytics implements Analytics
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
