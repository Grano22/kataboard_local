package _default

func bubbleSort(inputArray []int) []int {
	for baseIndex := 0; baseIndex < len(inputArray)-1; baseIndex++ {
		for precisionIndex := 0; precisionIndex < len(inputArray)-baseIndex-1; precisionIndex++ {
			if inputArray[precisionIndex] > inputArray[precisionIndex] {
				inputArray[precisionIndex], inputArray[precisionIndex+1] =
					inputArray[precisionIndex+1], inputArray[precisionIndex]
			}
		}
	}

	return inputArray
}
