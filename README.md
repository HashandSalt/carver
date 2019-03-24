# Kirby Carver

## What it does

This plugin allows you to write custom HTML tags, powered by PHP.

## Why?

Kirby is most awesome, but I do miss the simplicity of Textpattern's templating language, which looks like HTML. Having gone through available alternative templating engines like Twig and Blade, without much love, I decided to put this together.

For example, to get the a formatted date from a field, normally you would do something like this:

```
<time class="mytime">
  <?php echo $page->date()->toDate('d/m/Y') ?>
</time>
```

What if you could do this instead?


```
<kb:date format="d/m/Y" field="date" wraptag="time" class="mytime" />
```


You can find some example tags in `site/plugins/carver/library`

## Installation

* Download the files and place in `plugins/carver`
* Create a folder called `carver` under the `site` folder. This is where you tags will be stored.

## Usage

Let's create a simple tag as an example to show what this can do, based on the date tag mentioned above.

Start by creating the following file: 'site/carver/date/tag.php'.

Add this code to the file:

```
<?php
	function kb_date($tag)
	{
		// Get the attributes
		$att = json_decode(json_encode($tag['attributes']), true);

		// Deal with the attributes
		$format 	= isset($att['format']) ? $att['format'] : 'd/m/Y';
		$wraptag 	= isset($att['wraptag']) ? $att['wraptag'] : 'p';
		$class 		= isset($att['class']) ? $att['class'] : '';

		// Get the field date or use todays date if its not set or cant be found
		$dateval = isset($att['field']) ? page()->{$att['field']}()->toDate($format) : date($format);

		return Html::tag($wraptag, $dateval, ["class" => $class]);

}
```

Let's explain how that works. Our tag looks like this:

```
<kb:date format="d/m/Y" field="date" wraptag="time" class="mytime" />
```

It has three custom attributes, `format`, `field` and `class`.

If you use that in your template right now, you will get this rendered, assuming you have a date field set in your blueprint with a value stored:

```
<time class="mytime">02/02/2019</time>
```

Pretty self explanatory, you can set the field to use, the class to give the output, and the date format to use. But thats not all - you can skip some of the attributes because fallbacks have been set.

Doing this in a template will use todays date instead, format it to 'd/m/Y', and without adding a class:

```
<kb:date />
```

Will result in this:

```
<p>02/02/2019</p>
```

## More tag examples

```
<!-- Render a gist -->
<kb:gist url="https://gist.github.com/bastianallgeier/b79615a9f7ca76c810b7" />

<!-- Render a youtube video -->
<kb:youtube url="https://www.youtube.com/watch?v=VcjzHMhBtf0" width="100%" height="450px" autoplay="1" loop="1" />

<!-- Render a vimeo video -->
<kb:vimeo url="https://vimeo.com/324963776" width="100%" height="450px" autoplay="1" loop="1" autopause="0" />

<!-- Render an iframe -->
<kb:iframe url="https://getkirby.com" width="100%" height="400px" wraptag="div" class="iframecontent" wrapclass="iframecontainer" />

<!-- Render a link -->
<kb:a href="https://hashandsalt.com" class="mylink" rel="nofollow" />

<!-- Title -->
<kb:title field="title" wraptag="h1" />

<!-- Kirbytext from a field -->
<kb:kt field="text" />

<!-- Obfusifcated Email Link -->
<kb:email field="email" text="Email us today" class="mail" />

<!-- Images from a field, wrapped in a container tag and items wrapped in a tag each -->
<kb:images class="images" file="gallery" wraptag="ul" breaktag="li" />

<!-- Single image by name -->
<kb:image class="myimage" file="lw31n7hd1i.jpg" />

<!-- Handle a missing image gracefully -->
<kb:image class="myimage" file="lw31n7hsdfsdfd1i.jpg" />
```

## Road Map

* Bring tag parser up to date
* Refactor tag parser to allow for options to be set via config
* Create a big library of built in tags that work with Kirby's built in functions.
* ~Composer support~

## Dedication

When I am not using Kirby, I am using Textpattern. Sadly, Dean Allen, who created Textpattern died about a year ago. His philosophy of simplicity in a CMS aligns with that of Kirby, and this plugin is in his honour.
