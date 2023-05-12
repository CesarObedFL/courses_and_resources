const CARDS = 10;
const MAX_VISIBILITY = 3;

const Card = ({title, content}) => (
  `<div class='card'>
    <h2>${title}</h2>
    <p>${content}</p>
  </div>`
);

const Carousel = ({children}) => {
  const [active, setActive] = useState(2);
  const count = children.length;
  
  return (
    `<div class='carousel'>
      ${active > 0 ? `<button class='nav left' onclick='setActive(active - 1)'><i class='ti ti-chevron-left'></i></button>` : ''}
      ${children.map((child, i) => (
        `<div class='card-container' style='--active: ${i === active ? 1 : 0}; --offset: ${(active - i) / 3}; --direction: ${Math.sign(active - i)}; --abs-offset: ${Math.abs(active - i) / 3}; pointer-events: ${active === i ? 'auto' : 'none'}; opacity: ${Math.abs(active - i) >= MAX_VISIBILITY ? 0 : 1}; display: ${Math.abs(active - i) > MAX_VISIBILITY ? 'none' : 'block'};'>
          ${child}
        </div>`
      )).join('')}
      ${active < count - 1 ? `<button class='nav right' onclick='setActive(active + 1)'><i class='ti ti-chevron-right'></i></button>` : ''}
    </div>`
  );
};

const App = () => {
  const cards = Array.from({length: CARDS}, (_, i) => Card({title: `Card ${i + 1}`, content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'}));
  
  return `<div class='app'>
            ${Carousel({children: cards})}
          </div>`;
};

document.body.innerHTML = App();