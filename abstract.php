<html>
    <body>
        <?php
        abstract  class A{
            abstract protected function prefixName($name);
        }
        class B extends A {
            public function prefixName($name,$separ=".",$greet="Respected") {
              if ($name == "Sri") {
                $prefix = "Mr.";
              } elseif ($name == "Shree") {
                $prefix = "Mrs.";
              } else {
                $prefix = "";
              }
              return "{$greet} {$prefix} {$separ}{$name}";
            }
          }
          
        $class = new B();
        echo $class->prefixName("Sri");
        echo "<br>";
        echo $class->prefixName("Shree");
        ?>
    </body>
</html>