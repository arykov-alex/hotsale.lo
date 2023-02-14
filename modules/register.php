<?php
	$results = array(
		'errors'  => array(),
		'success' => '',
	);
	
	$form = $_POST['form'];
	
	/* фамилия, имя: введёны */
	if (empty($form['lastName'])) {
		$results['errors'][] = $translate['lastNameEmpty'];
	}
	if (empty($form['firstName'])) {
		$results['errors'][] = $translate['firstNameEmpty'];
	}

	/* email: введён, фильтр на символы @ и . */
	if (empty($form['email'])) {
		$results['errors'][] = $translate['emailEmpty'];
	} else
	if (checkEmail($form['email'])) {
		$results['errors'][] = $translate['emailError'];
	} else {
		/* WHERE тут для нормального запроса, без эмуляции массивом */
		$usersInBase = $sql->query('SELECT id, name, email FROM prefix_users WHERE email=#s',[ $form['email'] ]);
		$emails = array_column($usersInBase,'email');
		if (in_array($form['email'],$emails)) {
			$results['errors'][] = $translate['emailExists'];
		}
	}
		
	/* пароли: все введены, какой-то фильтр на символы, длину, на совпадение с повтором */
	if (empty($form['password'])) {
		$results['errors'][] = $translate['passwordEmpty'];
	} else
	if (empty($form['passwordConfirm'])) {
		$results['errors'][] = $translate['passwordConfirmEmpty'];
	} else
	if (checkPassword($form['password'])) {
		$results['errors'][] = $translate['passwordFilter'];
	}
	else if ($form['password'] != $form['passwordConfirm']) {
		$results['errors'][] = $translate['passwordError'];
	}

	/* приватность, была нажата галочка */
	if (empty($form['policy'])) {
		$results['errors'][] = $translate['policyEmpty'];
	}

	/* recapcha если нужна */
	if (checkCapcha('someToken')) {
		$results['errors'][] = $translate['capchaError'];
	}
	
	/* если нет ошибок в форме, то регистрируем */
	if (!$results['errors'])
	{
		/* добавляем юзверя в базу и говорим, что всё хорошо */
		$form['newId'] = $sql->insert('INSERT INTO prefix_users SET name=#s, email=#s, pass=#s',[
			$form['lastName'].' '.$form['firstName'],
			$form['email'],
			hashPassword($form['password']),
		]);
		/* шлём юзверю письмо и прочие оповещения используя подстановки с $form */
		
		/* добавляем запись в логи */
		addLog('Зарегистрировлся новый пользователь: '.$form['lastName'].' '.$form['firstName'].' с email '.$form['email']);

		$results['success'] = 'Вы успешно зарегистрированы, на ваш email было отправлено письмо для активации аккаунта';
	}

	echo json_encode($results);
	exit;
?>