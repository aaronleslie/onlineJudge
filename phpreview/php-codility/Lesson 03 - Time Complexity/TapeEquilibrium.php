<?php

/*
A non-empty zero-indexed array A consisting of N integers is given. Array A represents numbers on a tape.
Any integer P, such that 0 < P < N, splits this tape into two non-empty parts:
A[0], A[1], ..., A[P − 1] and A[P], A[P + 1], ..., A[N − 1].

The difference between the two parts is the value of:
|(A[0] + A[1] + ... + A[P − 1]) − (A[P] + A[P + 1] + ... + A[N − 1])|

In other words, it is the absolute difference between the sum of the first part and the sum of the second part.
For example, consider array A such that:

  A[0] = 3
  A[1] = 1
  A[2] = 2
  A[3] = 4
  A[4] = 3

We can split this tape in four places:

        P = 1, difference = |3 − 10| = 7
        P = 2, difference = |4 − 9| = 5
        P = 3, difference = |6 − 7| = 1
        P = 4, difference = |10 − 3| = 7

Write a function:

    function solution($A);

that, given a non-empty zero-indexed array A of N integers, returns the minimal difference that can be achieved.

For example, given:

  A[0] = 3
  A[1] = 1
  A[2] = 2
  A[3] = 4
  A[4] = 3

the function should return 1, as explained above.

Assume that:
        N is an integer within the range [2..100,000];
        each element of array A is an integer within the range [−1,000..1,000].

Complexity:
        expected worst-case time complexity is O(N);
        expected worst-case space complexity is O(N), 
        beyond input storage (not counting the storage required for input arguments).

Elements of input arrays can be modified.
*/

/**
 * CODILITY ANALYSIS: https://codility.com/demo/results/demoP7SCSC-ACG/
 * LEVEL: EASY
 * Correctness:	100%
 * Performance:	100%
 * Task score:	100%
 */
function solution($A) 
{
	// left sum after array $A splits, initialized to 0
	$leftSum = 0;
	// right sum after array $A splits, initialized to sum of all array $A elements
	$rightSum = array_sum($A);
	// minimal difference between left and right sum
	$diff = null;

	// at least one element needs to be on right side,
	// that is the reason why we iterate to "count($A) - 1"
	for($i = 0; $i < count($A) - 1; $i++) 
	{
		$leftSum += $A[$i];
		$rightSum -= $A[$i];

		// if diff is uninitialized, or difference is new absolute minimum difference
		if($diff === null || abs($leftSum - $rightSum) < $diff)
			$diff = abs($leftSum - $rightSum);
	}

	return $diff;
}

function solution1($A){
  $newarray=array();
  $counta=count($A);
  foreach ($A as $key => $value) {
    $left=array_slice($A, 0, $key+1);
    $right=array_slice($A, $key+1,$counta-$key-1);
    $new=abs($left-$right);
    $newarray[]=$new;
  }
  return max($newarray);
}
