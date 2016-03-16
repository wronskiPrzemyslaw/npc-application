<?php 

function convertDate($date) {

		$phpdate = strtotime($date);

		$months = [
			'styczeń', 'luty', 'marzec', 'kwiecień', 'maj', 'czerwiec', 'lipiec', 'sierpień', 'wrzesień',
			'październik', 'listopad', 'grudzień'
		];

		$goodLookingDate = date('d', $phpdate) .' '. $months[(int)(date('m', $phpdate))-1] . ' ' . date('Y', $phpdate);

		return $goodLookingDate;
}