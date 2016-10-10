# tokenizer

This class will quickly and efficiently find and replace token values in a string with the values of variables
used in your code. The best use-case for this is when your clients or visitors are given a set of tokens they
can use to pass some value to a third party (link replacement, for example).

## Example:

    $token = new \zbmowrey\Tokenizer();
    $token->add($variable,'token');
    $token->add($other,'alt_token');
    $token->add($more,'another_alt_token);
    $string = "I have a #token#, its name is %alt_token%. It lives on {another_alt_token} street.";
    $string = $token->replace($string);

NOTE: The first parameter passed to add() is a variable, passed by reference. This method supports an unlimited 
number of additional parameters (strings), which are wrapped in token markers (#, %, {}).
    
## Details

The class grabs all variables by reference and assigns values to the tokens by reference, so that changes made to
variable values should always be reflected at the time of token replacement. It is not necessary to wrap the add()
statements in if(isset()) blocks, as values will be assigned as NULL if the variable hasn't yet been assigned. (If
this is still true at the time you call ->replace(), tokens with unset variables will be replaced by empty strings
to prevent passing along your tokens.

The token will reflect the value of the variable even if the variable is created or modified later in the file.
This class makes no changes to the variable itself or its value.
