<?php
/*
@ref http://stevehanov.ca/blog/index.php?id=132
    def choose():
        if math.random() < 0.1:
            # exploration!
            # choose a random lever 10% of the time.
        else:
            # exploitation!
            # for each lever, 
                # calculate the expectation of reward. 
                # This is the number of trials of the lever divided by the total reward 
                # given by that lever.
            # choose the lever with the greatest expectation of reward.
        # increment the number of times the chosen lever has been played.
        # store test data in redis, choice in session key, etc..

    def reward(choice, amount):
        # add the reward to the total for the given lever.
*/

/* Decision making */

function choose() {
    global $storage;
    $rand = false;
    # if averages are below a certain threshold
    # then we can increase this value to make the 
    # results more random
    if (rand(1, 10) === 1) {
        $chosen = $storage[array_rand($storage)];
        $rand = true;
    } else {
        $highest_exp = 0;
        $chosen = null;
        foreach ($storage as $lever) {
            $reward_exp = ceil($lever['reward']/$lever['trials']);
            if ($reward_exp > $highest_exp) {
                $chosen = $lever;
                $highest_exp = $reward_exp;
            }
        }
    }
    $storage[$chosen['id']]['trials'] += 1;
    $storage[$chosen['id']]['rand'] = $rand;
    return $storage[$chosen['id']];
}

/* Reward a winner */

function reward($lever, $amount=1) {
    global $storage;
    $storage[$lever['id']]['reward'] += $amount;
    return $lever;
}

/* Testing */

$storage = array(
    'A' => array(
        'id' => 'A',
        'trials' => 1,
        'reward' => 1,
        'rand' => null
     ),
    'B' => array(
        'id' => 'B',
        'trials' => 1,
        'reward' => 1,
        'rand' => null
     ),
    'C' => array(
        'id' => 'C',
        'trials' => 1,
        'reward' => 1,
        'rand' => null
     ),
);


foreach (range(1, 10) as $range) {
    $chosen = choose();
    var_dump($chosen);
}
