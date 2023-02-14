	<form class="form form--ajax container mt-5" method="post" action="/">
		<input type="hidden" name="action" value="register">

		<div class="form__success alert alert-success" role="alert"></div>

		<div class="form__body">

			<div class="form__errors alert alert-danger" role="alert">тут ошибочки всякие будут</div>
		
			<div class="form__fields row mb-2">
				<div class="col-md-6 col-lg-4 mb-3">
					<label for="formLastName" class="form-label">Прізвище</label>
					<input class="form-control" type="text" name="form[lastName]" id="formLastName" data-empty="<? echo $translate['lastNameEmpty']?>">
				</div>
				<div class="col-md-6 col-lg-4 mb-3">
					<label for="form-formFirstName" class="form-label">Ім'я</label>
					<input class="form-control" type="text" name="form[firstName]" id="formFirstName" data-empty="<? echo $translate['firstNameEmpty']?>">
				</div>
				<div class="col-md-12 col-lg-4 mb-3">
					<label for="formEmail" class="form-label">E-mail (type=email)</label>
					<div class="input-group">
						<span class="input-group-text">@</span>
						<input class="form-control" type="text" name="form[email]" id="formEmail" data-empty="<? echo $translate['emailEmpty']?>">
					</div>
				</div>
			</div>
		
			<div class="form__passwords row">
				<div class="col-md-6 mb-3">
					<label for="formPass1" class="form-label">Пароль</label>
					<div class="input-group password">
						<input class="form-control" type="password" name="form[password]" id="formPass1" data-empty="<? echo $translate['passwordEmpty']?>">
						<button class="password__show input-group-text" type="button" area-label="Показать/скрыть пароль"><svg width="20" height="20"><use xlink:href="#icon-password"></use></svg></button>
					</div>
				</div>
				<div class="col-md-6 mb-3">
					<label for="formPass2" class="form-label">Повторіть пароль</label>
					<div class="input-group password">
						<input class="form-control" type="password" name="form[passwordConfirm]" id="formPass2" data-empty="<? echo $translate['passwordConfirmEmpty']?>">
						<button class="password__show input-group-text" type="button" area-label="Показать/скрыть пароль"><svg width="20" height="20"><use xlink:href="#icon-password"></use></svg></button>
					</div>
				</div>
			</div>

			<div class="form-check mb-3">
				<input class="form-check-input" type="checkbox" value="1" name="form[policy]" id="formPolicy" data-empty="<? echo $translate['policyEmpty']?>">
				<label class="form-check-label" for="formPolicy">З умовами <a href="/policy">угоди</a> та обробкою персональних даних згоден</label>
			</div>

			<div class="form__submit mb-4">
				<button class="btn btn-primary">Зареєструватись</button>
			</div>
		</div>
		
	</form>
