import * as esbuild from 'esbuild'
import postcss from 'esbuild-postcss'

let ctx

try {
    ctx = await esbuild.context({
        entryPoints: [
            { out: 'js/twple-pagebuilder', in: 'resources/js/twple-pagebuilder.jsx' },
            { out: 'css/twple-pagebuilder', in: 'resources/css/twple-pagebuilder.css' },
        ],
        bundle: true,
        minify: false,
        sourcemap: true,
        outdir: './',
        plugins: [
            postcss(),
            { name: "notify", setup(build) {
                build.onEnd(() => console.log('rebuilt'))
            }}
        ],
        
    })
    await ctx.watch()
    console.log('reacting and bundling...')

    const { host, port } = await ctx.serve({
        servedir: './',
        fallback: './pagebuilder.html'
    })
    console.log(`serving at http://${host}:${port}`)

} catch (e) {
    console.error('config error: ', e)
    process.exit(1)
}