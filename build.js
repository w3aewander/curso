const { execSync } = require('child_process')

console.log('🚀 Iniciando build...')

try {
  // Limpa caches
  execSync('rm -rf public/js/* public/css/*')
  execSync('rm -rf application/storage/framework/views/*')

  // Build do Vue
  execSync('npm run build')

  // Ajusta permissões
  execSync('chmod -R 664 public/js/* public/css/*')

  console.log('✅ Build concluído com sucesso!')
} catch (error) {
  console.error('❌ Erro no build:', error)
  process.exit(1)
}