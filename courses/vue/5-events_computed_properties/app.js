const { createApp, ref, computed } = Vue;


const original_quotes = [
    { quote: 'The night is darkest just before the dawn. And I promise you, the dawn is coming.', author: 'Harvey Dent, The Dark Knight' },
    { quote: 'I believe what doesn’t kill you simply makes you, stranger.', author: 'The Joker, The Dark Knight' },
    { quote: 'Your anger gives you great power. But if you let it, it will destroy you… As it almost did me', author: 'Henri Ducard, Batman Begins' },
    { quote: 'You either die a hero or live long enough to see yourself become the villain.', author: 'Harvey Dent, The Dark Knight' },
    { quote: 'If you’re good at something, never do it for free.', author: 'The Joker, The Dark Knight' },
    { quote: 'Yes, father. I shall become a bat.', author: 'Bruce Wayne/Batman, Batman: Year One' },
]

const app = createApp ({

    setup() {

        const show_author = ref(true);
        const quotes = ref(original_quotes);
        const total_quotes = computed( () => {
            return quotes.value.length;
        } );

        const toggle_author = () => {
            show_author.value = !show_author.value;
        };

        const add_quote = () => {
            quotes.value.unshift({ quote: 'hello world', author: 'César Obed Figueroa Luna' });
        };

        return {
            quotes,
            show_author,
            total_quotes,

            toggle_author,
            add_quote,        }
    }

});

app.mount('#myApp');