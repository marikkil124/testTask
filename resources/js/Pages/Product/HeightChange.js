
export  function deleteHeight(attributesDataLength,heightAttribute) {
    console.log(attributesDataLength)
    switch (attributesDataLength) {
        case 1:
        case 0:
        case 2:
           heightAttribute -= 57;
            break;

    }
return heightAttribute
}
export function addHeight(attributesDataLength,heightAttribute) {

    console.log(attributesDataLength)
    attributesDataLength=attributesDataLength?attributesDataLength:0
    switch (attributesDataLength) {
        case 1:
            heightAttribute += 57;
            break;
        case 2:
            if (heightAttribute === 437)
                heightAttribute += 57;
            else
                heightAttribute += 114;
            break;
        case 0:

            heightAttribute+=0
            break
        case 3:
           return heightAttribute

    }
    return heightAttribute
}
