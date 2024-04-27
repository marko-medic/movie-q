/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { store as NoticesStore } from "@wordpress/notices";
import { useDispatch } from "@wordpress/data";
import { useState } from "@wordpress/element";
import { useBlockProps } from "@wordpress/block-editor";

import "./editor.scss";

export default function Edit({ attributes, setAttributes }) {
	const { quoteText } = attributes;

	const [inputValue, setInputValue] = useState(undefined);
	const { createSuccessNotice } = useDispatch(NoticesStore);

	const handleChange = (e) => {
		setInputValue(e.target.value);
	};

	const handleSubmit = (e) => {
		e.preventDefault();
		setAttributes({ quoteText: inputValue });
		createSuccessNotice("Saved!");
	};

	const inputText = inputValue === undefined ? quoteText : inputValue;

	return (
		<div {...useBlockProps()}>
			<form onSubmit={handleSubmit}>
				<input name="quote-text" value={inputText} onChange={handleChange} />
				<button type="submit">Save me</button>
			</form>
		</div>
	);
}
