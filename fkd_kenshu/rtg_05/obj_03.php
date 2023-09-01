<?php


$nissan = new Car(110, "ノート");

print ("あなたは車に乗りました。どうしますか？（0:走る、1:給油する）". PHP_EOL);
$choice = trim(fgets(STDIN));

if ($choice == 0){

    print ("どこへ向かって走りますか？". PHP_EOL);
    $place = trim(fgets(STDIN));
    $nissan->runFor($place);

} elseif($choice == 1){

    $nissan->refueling();

}

while ($choice == 0 or $choice == 1){

    print ("どうしますか？（0:走る、1:給油する、2:終了する）". PHP_EOL);
    $choice = trim(fgets(STDIN));

    if ($choice == 0){

        print ("どこへ向かって走りますか？". PHP_EOL);
        $place = trim(fgets(STDIN));
        $nissan->runFor($place);
    
    } elseif($choice == 1){
    
        $nissan->refueling();
    
    }

}

print ("車から降ります。". PHP_EOL);

class Car {

    private $energy;
    private $max_energy;
    private $cost = 50;
    public $name;

    function __construct(int $max_energy, string $name) {
        $this->max_energy = $max_energy;
        $this->name = $name;
    }

    function runfor(string $destination): void {

        if ($this->energy < $this->cost){

            print("燃料が不足しています。給油を行います". PHP_EOL);
            $this->energy = $this->max_energy;
            print("満タンになりました。" . $destination . "に向かって走ります。シートベルトをしっかりしていてください。燃料残量={$this->energy}" . PHP_EOL);
            $this->energy = $this->energy - $this->cost;
            print("燃料を{$this->cost}使用し、{$destination}に到着しました。燃料残量={$this->energy}" . PHP_EOL);

        } else {

            print("はい。" . $destination . "に向かって走ります。シートベルトをしっかりしていてください。燃料残量={$this->energy}" . PHP_EOL);
            $this->energy = $this->energy - $this->cost;
            print("燃料を{$this->cost}使用し、{$destination}に到着しました。燃料残量={$this->energy}" . PHP_EOL);
            
        }
    }

    function refueling(): void {
        print("現在給油中です．．．．．．" . PHP_EOL);
        $this->energy = $this->max_energy;
        print("満タンになりました。" . PHP_EOL);
    }

}