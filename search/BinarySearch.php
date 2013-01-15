<?php 

namespace billhance\algorithms\search;

class BinarySearch
{
	/**
	 * Performs a binary search on a sorted array in 0(log(n)) time.
	 *
	 * @param int|string $needle
	 * @param array $haystack
	 * @param int $min
	 * @param int $max
	 * @return int The position of $needle in $haystack
	 */
	public function find(array $haystack, $needle, $min, $max) 
	{
		if($max < $min) {
			return -1;
		}

		// Calculate midpoint
		$mid = (int)(($max - $min) / 2) + $min; 

		if($haystack[$mid] > $needle) {
			return $this->find($haystack, $needle, $min, $mid - 1);
		} elseif ($haystack[$mid] < $needle) {
			return $this->find($haystack, $needle, $mid + 1, $max);
		} else {
			return $mid;
		}
	}
}