<?php
namespace PapoMS\VoluumApiWrapper;

class VoluumHelper {
	
	const VOLUUM_TIME_FORMAT = 'Y-m-d\TH:i:s\Z';
	const TIMEZONE = 'Europe/Berlin';

	static function dateRangeFromSlug($slug){
		date_default_timezone_set(self::TIMEZONE);

		//today = now()@00:00:00
		$from = (new \DateTime)->setTime(0,0);
		$to   = (new \DateTime)->setTime(0,0);
		
		switch ($slug) {
			case 'today':
				$to->add(new \DateInterval('P1D'));
				break;

			case 'yesterday':
				$from->sub(new \DateInterval('P1D'));
				break;
			
			//Last 30 days
			case 'last-30-days':
				$from->sub(new \DateInterval('P29D'));
				$to->add(new \DateInterval('P1D'));
				break;
			
			//Last 30 days full
			case 'last-full-30-days':
				$from->sub(new \DateInterval('P30D'));
				break;
			//Last 100 days full				
			case 'last-full-100-days':
				$from->sub(new \DateInterval('P100D'));
				break;
		}
		
		// Convert Dates to Voluum Date/Time Format and
		// return array to be used as part of query paramters		
		$dateRange = array(
			'from'	=> $from->format(self::VOLUUM_TIME_FORMAT),
			'to'	=> $to->format(self::VOLUUM_TIME_FORMAT),
			'tz'	=> self::TIMEZONE,
		);

		return $dateRange;
	}
}
