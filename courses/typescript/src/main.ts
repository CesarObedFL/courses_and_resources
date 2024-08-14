import './style.css'
import typescriptLogo from './typescript.svg'
import viteLogo from '/vite.svg'

//import './bases/01-const-let';
//import './bases/02-objects';
//import './bases/03-arrays';
//import './bases/04-functions';
//import './bases/05-functions-2';  
//import './bases/06-destructuring';
//import './bases/07-array-destructuring';
//import './bases/08-imports-exports';
//import './bases/09-promises';
//import './bases/10-promises-2';
//import './bases/11-fetch-api';
//import './bases/12-axios';
//import './bases/13-async-await';

document.querySelector<HTMLDivElement>('#app')!.innerHTML = `
  <div>
    <a href="https://vitejs.dev" target="_blank">
      <img src="${viteLogo}" class="logo" alt="Vite logo" />
    </a>
    <a href="https://www.typescriptlang.org/" target="_blank">
      <img src="${typescriptLogo}" class="logo vanilla" alt="TypeScript logo" />
    </a>
  </div>
`