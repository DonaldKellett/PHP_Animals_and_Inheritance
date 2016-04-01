<?php require 'test_fixture/class.test.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Fun with PHP Classes #2 - Animals and Inheritance</title>
  </head>
  <body>
    <h1>Fun with PHP Classes #2 - Animals and Inheritance</h1>
    <h2>Parent - <code>class Animal</code></h2>
    <pre style="background-color:black;color:white;padding:10px;border-radius:5px;"><code>class Animal {
  public $name;
  public $age;
  public $legs;
  public $species;
  public $status;
  public function __construct($name, $age, $legs, $species, $status) {
    $this->name = $name;
    $this->age = $age;
    $this->legs = $legs;
    $this->species = $species;
    $this->status = $status;
  }
  public function introduce() {
    return "Hello, my name is $this->name and I am $this->age years old.";
  }
}</code></pre>
    <?php
    class Animal {
      public $name;
      public $age;
      public $legs;
      public $species;
      public $status;
      public function __construct($name, $age, $legs, $species, $status) {
        $this->name = $name;
        $this->age = $age;
        $this->legs = $legs;
        $this->species = $species;
        $this->status = $status;
      }
      public function introduce() {
        return "Hello, my name is $this->name and I am $this->age years old.";
      }
    }
    $test_animal = new Test;
    $chicken = new Animal("Bob", 1, 2, "chicken", "alive");
    $test_animal->assert_equals($chicken->name, "Bob");
    $test_animal->assert_equals($chicken->age, 1);
    $test_animal->assert_equals($chicken->legs, 2);
    $test_animal->assert_equals($chicken->species, "chicken");
    $test_animal->assert_equals($chicken->status, "alive");
    $test_animal->assert_equals($chicken->introduce(), "Hello, my name is Bob and I am 1 years old.");
    $dino = new Animal("Barney", 5, 2, "dinosaur", "Alive and Happy");
    $test_animal->assert_equals($dino->name, "Barney");
    $test_animal->assert_equals($dino->age, 5);
    $test_animal->assert_equals($dino->legs, 2);
    $test_animal->assert_equals($dino->species, "dinosaur");
    $test_animal->assert_equals($dino->status, "Alive and Happy");
    $test_animal->assert_equals($dino->introduce(), "Hello, my name is Barney and I am 5 years old.");
    $test_animal->print_summary();
    ?>
    <h2>The Shark Class - <code>class Shark extends Animal</code></h2>
    <pre style="background-color:black;color:white;padding:10px;border-radius:5px;"><code>class Shark extends Animal {
  public function __construct($name, $age, $status) {
    parent::__construct($name, $age, 0, "shark", $status);
  }
}</code></pre>
    <?php
    class Shark extends Animal {
      public function __construct($name, $age, $status) {
        parent::__construct($name, $age, 0, "shark", $status);
      }
    }
    $test_shark = new Test;
    $billy = new Shark("Billy", 3, "Alive and well");
    $test_shark->assert_equals($billy->name, "Billy");
    $test_shark->assert_equals($billy->age, 3);
    $test_shark->assert_equals($billy->legs, 0);
    $test_shark->assert_equals($billy->species, "shark");
    $test_shark->assert_equals($billy->status, "Alive and well");
    $test_shark->assert_equals($billy->introduce(), "Hello, my name is Billy and I am 3 years old.");
    $charles = new Shark("Charles", 8, "Finding a mate");
    $test_shark->assert_equals($charles->name, "Charles");
    $test_shark->assert_equals($charles->age, 8);
    $test_shark->assert_equals($charles->legs, 0);
    $test_shark->assert_equals($charles->species, "shark");
    $test_shark->assert_equals($charles->status, "Finding a mate");
    $test_shark->assert_equals($charles->introduce(), "Hello, my name is Charles and I am 8 years old.");
    $test_shark->print_summary();
    ?>
    <h2>Cat - <code>class Cat extends Animal</code></h2>
    <pre style="background-color:black;color:white;padding:10px;border-radius:5px;"><code>class Cat extends Animal {
  public function __construct($name, $age, $status) {
    parent::__construct($name, $age, 4, "cat", $status);
  }
  public function introduce() {
    return parent::introduce() . "  Meow meow!";
  }
}</code></pre>
    <?php
    class Cat extends Animal {
      public function __construct($name, $age, $status) {
        parent::__construct($name, $age, 4, "cat", $status);
      }
      public function introduce() {
        return parent::introduce() . "  Meow meow!";
      }
    }
    $test_cat = new Test;
    $cathy = new Cat("Cathy", 7, "Playing with a ball of yarn");
    $test_cat->assert_equals($cathy->name, "Cathy");
    $test_cat->assert_equals($cathy->age, 7);
    $test_cat->assert_equals($cathy->legs, 4);
    $test_cat->assert_equals($cathy->species, "cat");
    $test_cat->assert_equals($cathy->status, "Playing with a ball of yarn");
    $test_cat->assert_equals($cathy->introduce(), "Hello, my name is Cathy and I am 7 years old.  Meow meow!");
    $spitsy = new Cat("Spitsy", 6, "sleeping");
    $test_cat->assert_equals($spitsy->name, "Spitsy");
    $test_cat->assert_equals($spitsy->age, 6);
    $test_cat->assert_equals($spitsy->legs, 4);
    $test_cat->assert_equals($spitsy->species, "cat");
    $test_cat->assert_equals($spitsy->status, "sleeping");
    $test_cat->assert_equals($spitsy->introduce(), "Hello, my name is Spitsy and I am 6 years old.  Meow meow!");
    $test_cat->print_summary();
    ?>
    <h2>Dog - <code>class Dog extends Animal</code></h2>
    <pre style="background-color:black;color:white;padding:10px;border-radius:5px;"><code>class Dog extends Animal {
  public $master;
  public function __construct($name, $age, $status, $master) {
    parent::__construct($name, $age, 4, "dog", $status);
    $this->master = $master;
  }
  public function greet_master() {
    return "Hello $this->master";
  }
}</code></pre>
    <?php
    class Dog extends Animal {
      public $master;
      public function __construct($name, $age, $status, $master) {
        parent::__construct($name, $age, 4, "dog", $status);
        $this->master = $master;
      }
      public function greet_master() {
        return "Hello $this->master";
      }
    }
    $test_dog = new Test;
    $doug = new Dog("Doug", 12, "Serving his master", "Eliza");
    $test_dog->assert_equals($doug->name, "Doug");
    $test_dog->assert_equals($doug->age, 12);
    $test_dog->assert_equals($doug->legs, 4);
    $test_dog->assert_equals($doug->species, "dog");
    $test_dog->assert_equals($doug->status, "Serving his master");
    $test_dog->assert_equals($doug->introduce(), "Hello, my name is Doug and I am 12 years old.");
    $test_dog->assert_equals($doug->greet_master(), "Hello Eliza");
    $test_dog->print_summary();
    ?>
    <h2>Summary Test</h2>
    <?php
    $test_summary = new Test;
    echo "<h3>class Animal</h3>";
    $test_summary->assert_equals($test_animal->passes, 12);
    $test_summary->assert_equals($test_animal->fails, 0);
    echo "<h3>class Shark extends Animal</h3>";
    $test_summary->assert_equals($test_shark->passes, 12);
    $test_summary->assert_equals($test_shark->fails, 0);
    echo "<h3>class Cat extends Animal</h3>";
    $test_summary->assert_equals($test_cat->passes, 12);
    $test_summary->assert_equals($test_cat->fails, 0);
    echo "<h3>class Dog extends Animal</h3>";
    $test_summary->assert_equals($test_dog->passes, 7);
    $test_summary->assert_equals($test_dog->fails, 0);
    echo "<hr />";
    $test_summary->print_summary();
    ?>
  </body>
</html>
