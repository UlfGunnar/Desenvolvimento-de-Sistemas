/* PARTE VIBECODE, FIQUEI COM TÉDIO ENTÃO QUERIA VER COMO FAZER UM MENU HAMBURGUER QUANDO A TELA FICASSE PEQUENA*/

document.addEventListener('DOMContentLoaded', () => {
  const btn = document.getElementById('btnMenu');
  const nav = document.getElementById('menuPrincipal');

  if (!btn || !nav) return;

  btn.addEventListener('click', () => {
    const aberto = nav.classList.toggle('aberto');
    btn.setAttribute('aria-expanded', aberto);
    btn.setAttribute('aria-label', aberto ? 'Fechar menu' : 'Abrir menu');
  });

  // fecha o menu ao clicar num link (útil em telas pequenas)
  nav.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
      nav.classList.remove('aberto');
      btn.setAttribute('aria-expanded', 'false');
    });
  });
});
