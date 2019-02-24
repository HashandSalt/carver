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

**This is not yet ready for prime time at this stage, this is a proof of concept. It works, but it is built around a old library (the only one i could find) for doing this kind of thing and the age of that library bothers me. I intend to refactor or re-write into something more modern.**

**I would love it if this became a community plugin. If you feel you can help out, please do :)**

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

## Advanced Use

Tags can be nested!....

```
<kb:upper type="ucwords">
  <p>This text is transformed by the custom tag.</p>
  <p><kb:lower>THIS IS LOWERCASE TEXT</kb:lower></p>
  <kb:date field="date" />
</kb:upper>
```

Renders this:

```
<p>This Text Is Transformed By The Custom Tag.</p>
<p>this is lowercase text</p>
<p>02/02/2019</p>
```


## Road Map

* Bring tag parser up to date
* Refactor tag parser to allow for options to be set via config
* Create a big library of built in tags that work with Kirby's built in functions.
* Composer support

## Dedication

When I am not using Kirby, I am using Textpattern. Sadly, Dean Allen, who created Textpattern died about a year ago. His philosophy of simplicity in a CMS aligns with that of Kirby, and this plugin is in his honour.
