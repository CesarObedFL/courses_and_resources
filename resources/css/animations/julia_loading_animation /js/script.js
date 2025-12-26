const canvas = document.createElement("canvas");
const w = canvas.width = 1920;
const h = canvas.height = 1080;
const ctx3d = getContext3d(canvas, fragmentShader.innerText);
document.body.prepend(canvas);
canvas.onclick = (e) => e.target.requestFullscreen();

!(function animate(t = 0) {
    ctx3d.update();
    requestAnimationFrame(animate);
})();


/********************************************************************************\
✨ mpxMicroGlFragLib: The Tiniest Library with the Longest Name ✨
   - A Micro WebGL Library for Fragment Shader Demos -
----------------------------------------------------------------------------------
Welcome to the ultimate paradox — a micro WebGL library with a name longer than 
the code itself! 😄
License: Public domain — it's all yours if you want it! Just remember, I'm not 
responsible for any glitches. 😉 But if you create something cool, please share! 
    - no need to copy this longwinded message if you don't feel like it 😜
    - You can DM me on CodePen or X (Twitter) @mpxdanny.
Features:
    - Small but mighty — this library packs a punch in a teeny-tiny package.
    - Ideal for fragment shader demos (think shadertoy or glslsandbox).
    - Easy to grasp — because who has time for complicated code?
    - No error handling—it's not a flaw, it's a philosophy! 😜
    - User-friendly — unless you’re trying to solve world hunger with it.
    - Bug-free… maybe? (At least none that I've found!)
Usage:
  To get a WebGLRenderingContext:
  getContext3d(HtmlCanvasObject: canvasObj, String: fragmentShaderScript, 
  [optional String: vertexShaderScript])
  To update the canvas, simply call <context>.update([Optional Number: time])
 
Hosted: (and maybe even maintained) here: 
    https://gist.github.com/dannyhille/4d4e4d0a52e2ff98867c8005e44b09b3
\**********************************************************************************/


function getContext3d(canvasObj, fragmentShaderScript, vertextShaderScript) {
    this.context = canvasObj.getContext("webgl2");
    const w = this.context.canvas.width;
    const h = this.context.canvas.height;
    this.context.bindBuffer(this.context.ARRAY_BUFFER, this.context.createBuffer());
    this.context.bufferData(this.context.ARRAY_BUFFER, new Float32Array([
        -1, -1, 1, -1, -1, 1, -1, 1, 1, -1, 1, 1]), this.context.STATIC_DRAW);
    const program = this.context.createProgram();
    const vshader = this.context.createShader(this.context.VERTEX_SHADER);
    const fshader = this.context.createShader(this.context.FRAGMENT_SHADER);
    this.context.shaderSource(vshader, vertextShaderScript || `precision mediump float;attribute vec2 a_texcoord;
attribute vec2 a_position;varying vec2 v_texcoord;void main(){v_texcoord=a_texcoord;gl_Position = vec4(a_position, 0, 1);}`);
    this.context.shaderSource(fshader, fragmentShaderScript);
    this.context.compileShader(vshader);
    this.context.compileShader(fshader);
    this.context.attachShader(program, vshader);
    this.context.attachShader(program, fshader);
    this.context.linkProgram(program);
    this.context.useProgram(program);
    this.context.program = program;
    const positionLocation = context.getAttribLocation(program, "a_position");
    this.context.enableVertexAttribArray(positionLocation);
    this.context.vertexAttribPointer(positionLocation, 2, context.FLOAT, false, 0, 0);
    const texcoordLocation = context.getAttribLocation(program, "a_texcoord");
    this.context.enableVertexAttribArray(texcoordLocation);
    this.context.vertexAttribPointer(texcoordLocation, 2, context.FLOAT, false, 0, 0);
    this.context.uniform2f(context.getUniformLocation(program, "resolution"), w, h);
    this.context.viewport(0, 0, w, h);
    this.context.setUiform1F = (name, val) => {
        this.context.uniform1f(this.context.getUniformLocation(this.context.program, name), val);
    };
    this.context.setUiform4F = (name, val) => {
        this.context.uniform4f(this.context.getUniformLocation(this.context.program, name), ...val);
    };
    this.context.update = (time = performance.now() * .001) => {
        this.context.uniform1f(this.context.getUniformLocation(this.context.program, "time"), time);
        context.drawArrays(this.context.TRIANGLES, 0, 6);
    };
    return context;
}