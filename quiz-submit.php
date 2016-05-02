<?php
// get answers from POST
$qs = array();
$qs['q1'] = isset($_POST['q1']) ? $_POST['q1'] : '';
$qs['q2'] = isset($_POST['q2']) ? $_POST['q2'] : '';
$qs['q3'] = isset($_POST['q3']) ? $_POST['q3'] : '';
$qs['q4'] = isset($_POST['q4']) ? $_POST['q4'] : '';
$qs['q5'] = isset($_POST['q5']) ? $_POST['q5'] : '';
$qs['q6'] = isset($_POST['q6']) ? $_POST['q6'] : '';
$qs['q8'] = isset($_POST['q8']) ? $_POST['q8'] : '';

$q9 = isset($_POST['q9']) ? $_POST['q9'] : '';
// username
$username = $q9;

// Show error message for users who try to access the result page
// Without taking the quiz
if($username == "" || $username == null) {
    echo "Invalid Access. Return to <a href='/PetMatch'>Home</a>";
    exit();
}

$animal_names = array('dog', 'cat', 'fish', 'guinea pig', 'rabbit', 'parrot',
    'turtles', 'snakes', 'chinchilla', 'horse');

$conditions = array(
    'q1' => array(
        'a' => array('turtles', 'snakes', 'chinchilla', 'parrot', ),
        'b' => array('turtles', 'snakes', 'chinchilla', 'parrot', ),
        'c' => array('turtles', 'snakes', 'chinchilla', 'parrot', ),
        'd' => array('dog', 'cat', 'fish', 'guinea pig', 'rabbit', ),
    ),
    'q2' => array(
        'a' => array('horse'),
    ),
    'q3' => array(
        'a' => array('dog', 'cat', 'guinea pig', 'horse','snakes'),
        'b' => array('dog', 'horse','snakes'),
        'c' => array('horse'),
    ),
    'q4' => array(
        'a' => array('dog', 'cat', 'rabbit', 'parrot', 'turtles', 'snakes', 'horse'),
        'b' => array('guinea pig', 'chinchilla', 'horse', 'parrot'),
        'c' => array('dog', 'cat', 'fish', 'guinea pig', 'rabbit', 'parrot', 'turtles', 'snakes', 'chinchilla', ),
        'd' => array('dog', 'cat', 'fish', 'guinea pig', 'rabbit', 'snakes', 'chinchilla', 'horse', ),
    ),
    'q5' => array(
        'b' => array('dog', 'guinea pig', 'chinchilla', 'horse'),
    ),
    'q6' => array(
        'b' => array('dog', 'cat', 'guinea pig', 'rabbit', 'chinchilla',),
        'c' => array('dog', 'rabbit', 'guinea pig',),
    ),
    'q8' => array(
        'a' => array('fish', 'guinea pig', 'turtles', 'snakes', ),
        'b' => array('fish', 'guinea pig', 'turtles', 'snakes', ),
        'c' => array('dog', 'horse', 'cat', ),
        'd' => array('dog', 'horse', 'cat', 'rabbit', 'chinchilla', 'parrot', 'horse',),
    ),
);

$names = $animal_names;
foreach ($qs as $q => $a) {
    $t = isset($conditions[$q][$a]) ? $conditions[$q][$a] : array();
    $names = array_diff($names, $t);
}
if (count($names) == 0) {
    $names = $animal_names;
}

// animals attribue
$animals = array (
    'dog' => array(
        'life' => '10-13',
        'execise' => 'Yes',
        'smell' => 'Yes',
        'furry' => 'Yes',
        'good_for' => array('Adult', 'Teenagers', 'Kids'),
        'vet' => '$50',
        'image' => 'animal/dog.jpg',
    ),
    'cat' => array(
        'life' => 15,
        'execise' => 'No',
        'smell' => 'No',
        'furry' => 'Yes',
        'good_for' => array('Adult', 'Teenagers'),
        'vet' => '$25',
        'image' => 'animal/cat.png',
    ),
    'fish' => array(
        'life' => 10,
        'execise' => 'No',
        'smell' => 'No',
        'furry' => 'No',
        'good_for' => array('Adult', 'Teenagers', 'Kids'),
        'vet' => '$0',
        'image' => 'animal/fish.jpg',
    ),
    'guinea pig' => array(
        'life' => 5,
        'execise' => 'No',
        'smell' => 'Yes',
        'furry' => 'Yes',
        'good_for' => array('Adult', 'Teenagers', 'Kids'),
        'vet' => '$25',
        'image' => 'animal/guinea pig.jpg',
    ),
    'rabbit' => array(
        'life' => 10,
        'execise' => 'No',
        'smell' => 'No',
        'furry' => 'Yes',
        'good_for' => array('Teenagers', 'Kids'),
        'vet' => '$10',
        'image' => 'animal/rabbit.jpg',
    ),
    'parrot' => array(
        'life' => '30-50',
        'execise' => 'No',
        'smell' => 'No',
        'furry' => 'No',
        'good_for' => array('Adult', 'Teenagers'),
        'vet' => '$10',
        'image' => 'animal/parrot.jpg',
    ),
    'turtles' => array(
        'life' => 40,
        'execise' => 'No',
        'smell' => 'No',
        'furry' => 'No',
        'good_for' => array('Adult', 'Teenagers'),
        'vet' => '$0',
        'image' => 'animal/turtles.jpg',
    ),
    'snakes' => array(
        'life' => 15,
        'execise' => 'No',
        'smell' => 'No',
        'furry' => 'No',
        'good_for' => array('Adult'),
        'vet' => '$25',
        'image' => 'animal/snakes.jpg',
    ),
    'chinchilla' => array(
        'life' => 10,
        'execise' => 'No',
        'smell' => 'No',
        'furry' => 'No',
        'good_for' => array('Teenagers', 'Kids'),
        'vet' => '$10',
        'image' => 'animal/chinchilla.jpg',
    ),
    'horse' => array(
        'life' => 25,
        'execise' => 'No',
        'smell' => 'No',
        'furry' => 'Yes',
        'good_for' => array('Adult'),
        'vet' => 'More than $75',
        'image' => 'animal/horse.jpg',
    ),
);

// choose a animal base on the awner
$rnd = rand() % count($names);

$choose_animal_name = $names[$rnd];
$choose_animal = $animals[$choose_animal_name];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Result | PetMatch</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div id="header">
    <div class="nav">
    	<span class="home"><a href="/PetMatch">PetMatch</a></span>
      <ul>
        <li class="quiz"><a href="warning.html">Take the Quiz</a></li>
        <li class="credit"><a href="credit.html">Credits</a></li>
      </ul>
      <span class="login">Log In</span>
      <span class="signup">Sign Up Free</span>
    </div>
  </div>

  <div id="content">

    <div class="info">
        <div><?=$username?>, we recommend this pet for you: </div>
        <div class="name"><?=ucfirst($choose_animal_name)?></div>
        <div class="row">
            <label>Life Span: </label>
            <span class="value"><?=$choose_animal['life']?> years</span>
        </div>
        <div class="row">
            <label>Needs execise: </label>
            <span class="value"><?=$choose_animal['execise']?></span>
        </div>
        <div class="row">
            <label>Has smell: </label>
            <span class="value"><?=$choose_animal['smell']?></span>
        </div>
        <div class="row">
            <label>Is furry: </label>
            <span class="value"><?=$choose_animal['furry']?></span>
        </div>
        <div class="row">
            <label>Vet: </label>
            <span class="value"><?=$choose_animal['vet']?> per month for vet</span>
        </div>
        <div class="row">
            <label>Good for: </label>
            <span class="value"><?=implode($choose_animal['good_for'],',&nbsp;')?></span>
        </div>
        <div class="row">
            <img src="<?=$choose_animal['image']?>" />
        </div>
    </div>

  	<div class="footer">
  		<div class="footer-content">
  			<span>© 2016 PetMatch, Inc.</span>
  			<span class="footer-text"><a href="#">Take the Quiz</a>
  				| <a href="#">Credits</a></span>
  		</div>
  	</div>
  </div>


</body>
</html>