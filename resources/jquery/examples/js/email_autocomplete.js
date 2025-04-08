function email_autocomplete()
{
    const email_input = document.getElementById('email');
    if ( email_input.value.includes('@') ) {
        email_input.value += 'gmail.com';
    }
}