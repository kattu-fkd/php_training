<?php


$nissan = new Car(110, "ノート",4);

print ("あなたは車に乗りました。どうしますか？（0:走る、1:給油する、2:誰かを乗せる、それ以外:終了する）". PHP_EOL);
$choice = trim(fgets(STDIN));

if ($choice == 0){

    print ("どこへ向かって走りますか？". PHP_EOL);
    $place = trim(fgets(STDIN));
    $nissan->runFor($place);

} elseif($choice == 1){

    $nissan->refueling();

} elseif($choice == 2){

    $nissan->add_user();

}

while ($choice == 0 or $choice == 1 or $choice == 2 or $choice == 3){

    print ("どうしますか？（0:走る、1:給油する、2:誰かを乗せる、3:誰かを降ろす、それ以外:終了する）". PHP_EOL);
    $choice = trim(fgets(STDIN));

    if ($choice == 0){

        print ("どこへ向かって走りますか？". PHP_EOL);
        $place = trim(fgets(STDIN));
        $nissan->runFor($place);
    
    } elseif($choice == 1){
    
        $nissan->refueling();
    
    } elseif($choice == 2){

        $nissan->add_user();
    
    } elseif($choice == 3){

        $nissan->delete_user();
    
    }

}

print ("車から降ります。". PHP_EOL);

class Car {

    private $energy;
    private $max_energy;
    private $cost = 50;
    public $name;
    private $max_people;
    private $passenger_number = 1;

    function __construct(int $max_energy, string $name, int $max_people) {
        $this->max_energy = $max_energy;
        $this->name = $name;
        $this->max_people = $max_people;
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

    function add_user(): void {

        print("乗車する人の名前を記入してください。" . PHP_EOL);
        $passenger_name = trim(fgets(STDIN));

        if($this->max_people == $this->passenger_number){
            print("満員です。載せられません。" . PHP_EOL);
        } else {
            $this->passenger_number = $this->passenger_number + 1; 
            print("現在の乗客数は{$this->passenger_number}人です。" . PHP_EOL);

        }
    
    }

    function delete_user(): void {

        print("降車する人の名前を記入してください。" . PHP_EOL);
        $passenger_name = trim(fgets(STDIN));
        
        if($this->passenger_number == 1 ){
            print("運転手がいなくなるため降車できません。" . PHP_EOL);
        } else {
            $this->passenger_number = $this->passenger_number - 1; 
            print("現在の乗客数は{$this->passenger_number}人です。" . PHP_EOL);
        }

    }

}