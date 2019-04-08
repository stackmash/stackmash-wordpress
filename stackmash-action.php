<?php

function stackmash_action($category, $title, $body = [])
{
	// Get the options
	$options = get_option('stackmash');

	$data = [
		"public_key" => $options['public_key'],
		"private_key" => $options['private_key'],
		"category" => $category,
		"title" => $title,
		"body" => json_encode($body)
	];

	$response = stackmash_post($data);

	if(!stackmash_hasErrors($response))
	{
		return stackmash_toObject($response);
	} else {
		try
		{
			return stackmash_error($response);
		} catch(Exception $e) {
			return $e;
		}
	}
}

function stackmash_post($data)
{
	$response = [];
	$opts = [];

	$opts[CURLOPT_URL] = 'https://api.stackmash.com/api/notification/create';
	$opts[CURLOPT_RETURNTRANSFER] = true;
	$opts[CURLOPT_POST] = true;
	$opts[CURLOPT_POSTFIELDS] = $data;
	$opts[CURLOPT_HTTPHEADER] = ['Accept: application/json'];

	$tries = 0;

	while(true)
	{
		$ch = curl_init();

		curl_setopt_array($ch, $opts);

		$response['raw'] = curl_exec($ch);
		$response['errorNumber'] = curl_errno($ch);
		$response['errorMessage'] = curl_error($ch);
		$response['responseCode'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		curl_close($ch);

		if(stackmash_shouldRetry($response, $tries))
		{
			$tries = $tries + 1;
		} else {
			break;
		}
	}

	return $response;
}

function stackmash_toObject($response)
{
	return json_decode($response['raw']);
}

function stackmash_hasErrors($response)
{
	if($response['raw'] === false)
	{
		return true;
	} else {
		if($response['responseCode'] != 200 && $response['responseCode'] != 201)
		{
			return true;
		}
	}

	return false;
}

function stackmash_error($response)
{
	switch($response['responseCode'])
	{
		case 401:
			throw new Exception($response['raw']);
			break;

		case 403:
			throw new Exception($response['raw']);
			break;

		case 404:
			throw new Exception($response['raw']);
			break;

		case 422:
			throw new Exception($response['raw']);
			break;

		case 500:
			throw new Exception($response['raw']);
			break;
	}

	switch($response['errorNumber'])
	{
		case CURLE_COULDNT_CONNECT:
		case CURLE_OPERATION_TIMEOUTED:
		case CURLE_COULDNT_RESOLVE_HOST:
			throw new Exception('{"message":"Connection error: ' . $response['errorMessage'] . '"}');
			break;

		case CURLE_SSL_CACERT:
		case CURLE_SSL_PEER_CERTIFICATE:
			throw new Exception('{"message":"SSL error: ' . $response['errorMessage'] . '"}');
			break;

		default:
			throw new Exception('{"message":"Error, please contact support@stackmash.com: ' . $response['errorMessage'] . '"}');
	}
}

function stackmash_shouldRetry($response, $tries)
{
	if($tries >= 3)
	{
		return false;
	}

	if($response['errorNumber'] === CURLE_OPERATION_TIMEOUTED)
	{
		return true;
	}

	if($response['errorNumber'] === CURLE_COULDNT_CONNECT)
	{
		return true;
	}

	if($response['responseCode'] === 409)
	{
		return true;
	}

	return false;
}