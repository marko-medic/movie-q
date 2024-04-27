/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

import { useState } from '@wordpress/element';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from '@wordpress/block-editor';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit({attributes, setAttributes}) {

	const {quoteText} = attributes;

	const [inputValue, setInputValue] = useState(undefined);

	const handleChange = e => {
		setInputValue(e.target.value);
	}

	const handleSubmit = e => {
		e.preventDefault();
		setAttributes({quoteText: inputValue});
		alert("Saved!");
	}

	const inputText = inputValue === undefined ? quoteText : inputValue;

	return (
		<div { ...useBlockProps() }>
			<form onSubmit={handleSubmit}>
				<input name='quote-text' value={inputText} onChange={handleChange}  />
				<button type='submit'>Save me</button>
			</form>
		</div>
	);
}
