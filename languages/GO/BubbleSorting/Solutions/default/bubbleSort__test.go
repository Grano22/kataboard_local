package _default

import (
	"reflect"
	"testing"
)

type addArraySamples struct {
	givenArray, expected []int
}

//var arraySamples = []addArraySamples{
//	addArraySamples{
//		[]int{50, 13, 31, 71, 32},
//		[]int{13, 31, 32, 50, 71},
//	},
//}

func testBubbleSorting(t *testing.T) {
	// Arrange
	sample := []int{50, 13, 31, 71, 32}
	want := []int{13, 31, 32, 50, 71}

	// Act
	got := bubbleSort(sample)

	// Assert
	reflect.DeepEqual(want, got)
	assert
}

//func testMultipleBubbleSorting(t *testing.T) {
//	for _, test := range addArraySamples{
//		if output := bubbleSort(test.givenArray)
//	}
//}
