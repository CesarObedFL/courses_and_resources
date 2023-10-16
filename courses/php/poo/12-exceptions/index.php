<?php

// try catch is used to catch errors in code susceptible to them
try {
    throw new Exception('Logic error!...');

} catch (Exception $e) {
    echo "there have been an error: " . $e->getMessage();

} finally {
    echo "ending the code block!...";
}