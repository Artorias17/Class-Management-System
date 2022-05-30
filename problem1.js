
/*
Using NodeJS v17.8
 */

//Creating interface for reading from inputstream and writing to outputstream
const readline = require("readline").createInterface({
    input: process.stdin,
    output: process.stdout
});

//calculate the final score from the finalized array
const evaluateArray = (scoreArray) => {
    let answer = 0;
    scoreArray.forEach((score) => answer += score);
    return answer;
}

//Build finalized stack from input array
// + -> sum up last 2 elements from the array and append it the new array.
// number -> append number as it is to the new array
// R -> pop last element from the new array
// D -> double up the last element and append it to the new array
const buildStack = (givenInputArray) => {
    let stack = [];

    givenInputArray.forEach((item) => {
        if(isNaN(Number(item))){

            if(item === "+"){
                stack.push(stack[stack.length-1] + stack[stack.length-2]);
            }

            else if(item === "D"){
                stack.push(stack[stack.length-1] * 2);
            }

            else if(item === "R"){
                stack.pop();
            }
        }
        else{
            stack.push(Number(item));
        }
    })

    return stack;
}

//Taking in input from the console and sanitizing the string by removing [, ], " and ' characters
readline.question('Enter Input Array\n', (inputString) => {
    readline.close();

    inputString = inputString.trim().replaceAll(/[\[\]"']/g, "");

    let stack = buildStack(inputString.split(",").map(item => item.trim()));

    console.log(evaluateArray(stack))
});