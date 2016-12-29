<?php
	/*
	 * Prosty skrypt do rozlaczania i ponownego podlaczania linii adsl w livebox.
	 *
	 * Skrypt sprawdzany na Sagem F@st3202, oprogramowanie w wersji 3202TPSA_240334, tylko
	 * takiego livebox-a posiadam i nie wiem czy TP nie sprzedaje urzadzen nazywanych jako
	 * livebox, ktore posiadaja inny sprzet w srodku lub inna wersje oprogramowania.
	 *
	 * Skrypt mozna uruchomic zarowno na Linux jak i Windows, warunkiem jest posiadanie PHP CLI z CURL.
	 *
	 * LiveboxReconnect v20100718 by Dominik Cebula
	 * dominikcebula@gmail.com
	 *
	 */
	
	$useragent="Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1";
	$ipaddr='192.168.1.1';
	$user='admin';
	$password='moje_haslo';
	
	$curl = curl_init($ipaddr);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($curl, CURLOPT_USERAGENT, $useragent);
	curl_setopt($curl, CURLOPT_USERPWD, $user.':'.$password);
	curl_exec($curl);
	
	curl_setopt($curl, CURLOPT_URL, $ipaddr.'/SubmitInternetService');
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, 'ACTION_DISCONNECT=Roz%26%23322%3B%26%23261%3Bcz');
	curl_exec($curl);
	
	curl_setopt($curl, CURLOPT_URL, $ipaddr.'/SubmitInternetService');
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, 'ACTION_CONNECT=Po%26%23322%3B%26%23261%3Bcz');
	curl_exec($curl);
	
	curl_close($curl);
?>
