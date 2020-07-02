<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Загрузка и ресайз изображения</title>

	<script src="js/jquery.min.js"></script>
	<script src="bootstrap-4.5.0-dist/js/bootstrap.bundle.min.js"></script>
	<script src="js/script.js"></script>

	<link rel="stylesheet" href="bootstrap-4.5.0-dist/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="bootstrap-4.5.0-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.sass">
</head>
<body>
	<div class="container">
		<div class="row my-3">
			<div class="col-12">
				<div class="input-group">
					<input type="file" class="custom-file-input" id="js_file" accept="image/*">
					<label class="custom-file-label" for="js_file">Выберите файл</label>
				</div>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col-6">
				<div>На сколько процентов изменить размер картинки:</div>
				<div class="input-group col-3 px-0">
					<input type="number" class="form-control" aria-describedby="precent" id="js_percent" value="50">
					<div class="input-group-append">
						<span class="input-group-text" id="precent">%</span>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-4">
				<button class="btn btn-primary" id="js_resizeImg">ОК</button>
			</div>
		</div>
	</div>
</body>
</html>