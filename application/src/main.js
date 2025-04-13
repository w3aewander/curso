import { createApp } from 'vue'
import App from './App.vue'

// Cria a aplicação Vue
const app = createApp(App)

// Aguarda o DOM estar pronto
document.addEventListener('DOMContentLoaded', () => {
    // Verifica se o elemento existe
    const appElement = document.getElementById('app')
    if (appElement) {
        app.mount('#app')
        console.log('Vue montado com sucesso')
    } else {
        console.error('Elemento #app não encontrado')
    }
})
