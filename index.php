﻿<?php
	require("dbContext.php");
?>

<html>
<head>
	<link rel="stylesheet" href="styles/index.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="index.js"></script>
</head>

<body>
<h1 class="title">Проект клініка</h1>


<div class="content">
	<div class="output">
		<div class="content-item nurses ">
			<p class="content-title">Оберіть медсестру</p>
			<form>
				<select class="nurses" name="nurses">
					<?php
						foreach(GetNurses() as $nurse)
						{
							if (isset($_GET["nurses"]) && $nurse["id_nurse"] == $_GET["nurses"]){
								echo '<option selected="selected" value=' . $nurse["id_nurse"] . '>' . $nurse["name"] . '</option>';
							}
							else
							{
								echo "<option value=" . $nurse["id_nurse"] . ">" . $nurse["name"] . "</option>";
							}
						}
					?>
				</select>
			</form>
			<div class="results">
				<span class="results-title">Перечінь палат, в яких дежурить обрана медсестра:</span>
				<div class="results result-nurses">
				</div>
			</div>
		</div>

		<div class="content-item wards">
			<p class="content-title">Оберіть відділення</p>
			<form>
				<select class="departments" name="departments">
					<?php
						foreach(GetDepartments() as $department)
						{
							if (isset($_GET["departments"]) && $department["department"] == $_GET["departments"]){
								echo '<option selected="selected" value=' . $department["department"] . '>' . $department["department"] . '</option>';
							}
							else
							{
								echo "<option value=" . $department["department"] . ">" . $department["department"] . "</option>";
							}
						}
					?>
				</select>
			</form>
			<div class="results">
				<span class="results-title">Медсестри обраного відділення:</span>
				<div class="results result-departments">
				</div>
			</div>
		</div>

		<div class="content-item shift">
			<p class="content-title">Оберіть зміну</p>
			<form>		
				<select class="shifts" name="shifts">
					<?php
						foreach(GetShifts() as $shift)
						{
							if (isset($_GET["shifts"]) && $shift["shift"] == $_GET["shifts"]){
								echo '<option selected="selected" value=' . $shift["shift"] . '>' . $shift["shift"] . '</option>';
							}
							else
							{
								echo "<option value=" . $shift["shift"] . ">" . $shift["shift"] . "</option>";
							}
						}
					?>
				</select>
			</form>
			<div class="results">
				<span class="results-title">Чергування в обрану зміну:</span>
				<div class="results result-shifts">
				</div>
			</div>
		</div>
	</div>
	
	<h3 class="section-title">Додавання нової медсестри</h3>	
	<div class="add-nurse">
		<form action="addNurse.php" method="post">
			<div class="name">
				<p>Ім'я</p>
				<input require name="name" type="text" placeholder="Ім'я нової медсестри">
			</div>

			<div>
				<p>Відділення:</p>
				<select name="departments">
					<?php
						foreach(GetDepartments() as $department)
						{
							echo "<option value=" . $department["department"] . ">" . $department["department"] . "</option>";
						}
					?>	
				</select>
			</div>

			<div>
				<p>Зміна:</p>
				<select name="shifts">
					<?php
						foreach(GetShifts() as $shift)
						{
							echo "<option value=" . $shift["shift"] . ">" . $shift["shift"] . "</option>";
						}
					?>
				</select>
			</div>
			<button class="submit" type="submit">Додати</button>
		</form>
	</div>

	<h3 class="section-title">Додавання нової палати</h3>	
	<div class="add-nurse">
		<form action="addWard.php" method="post">
			<div class="name">
				<p>Назва нової палати </p>
				<input require name="name" type="text" placeholder="Назва палати">
			</div>
			<button class="submit" type="submit">Додати</button>
		</form>
	</div>

	<h3 class="section-title">Звязування палати з медсестрою</h3>	
	<div class="add-nurse">
		<form action=" connectWards.php" method="post">
			<div>
				<p>Медсестра:</p>
				<select name="nurse">
						<?php
							foreach(GetNurses() as $nurse)
							{
								echo "<option value=" . $nurse["id_nurse"] . ">" . $nurse["name"] . "</option>";
							}
						?>
				</select>
			</div>

			<div>
				<p>Палата:</p>
				<select name="ward">
						<?php
							foreach(GetWards() as $ward)
							{
								echo "<option value=" . $ward["id_ward"] . ">" . $ward["name"] . "</option>";
							}
						?>
				</select>
			</div>
			<button class="submit" type="submit">Зв'язати</button>
		</form>
	</div>
</div>
</body>
</html>