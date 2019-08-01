# Marzeotti Base

Base WordPress theme used by Mark Marzeotti. Based on Underscores with Bourbon Neat and Webpack bundling.

In Terminal, navigate to theme and run `npm start` to start Webpack watching.

## Theme Features

### [Bourbon](https://www.bourbon.io/docs/6.0.0/) v6.0.0

Bourbon is a set of SCSS mixins available in this theme to make adding certain styles easier. It also includes an autoprefixer but Webpack will actually do that for us. Use it like this:

```scss
.positioned-element {
    @include position(absolute, 0 0 null 0);
}
```

The code above would produce the following CSS:

```css
.positioned-element {
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
}
```

### [Bourbon Neat](https://neat.bourbon.io/docs/4.0.0/) v4.0.0

Bourbon Neat is also a set of SCSS mixins but will allow you to quickly and easily create responsive styles without the use of a framework like Foundation or Bootstrap. By default it is based on a 12 column grid. Use it like this:

```scss
.six-columns {
    @include grid-column(6);
}
```

The code above would produce the following CSS:

```css
.six-columns {
    width: calc(50% - 25px);
    float: left;
    margin-left: 20px;
}
```

You can use Bourbon Neat to create any layout you could create with Foundation or Bootstrap without all the messy classes, additional dependancies, and extras.
