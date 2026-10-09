# Marc Whesley Bartolome — Portfolio

Assignment-ready, single-page portfolio using semantic HTML, Tailwind CSS via its Play CDN, and vanilla JavaScript. Open `index.html` in a browser with an internet connection so Tailwind can load.

Repeated Tailwind utility groups are kept readable with component selectors in the Tailwind style block. For example, `.project-card` styles its direct image and content container with nested `& > img` and `& > div` rules, and the contact form groups its labels, fields, and button the same way.

## Project structure

```text
portfolio-submission/
├── index.html
├── js/
│   └── main.js
└── assets/
    └── images/
        ├── profile/
        └── projects/
```

## JavaScript features

1. Accessible mobile navigation toggle.
2. Active navigation link based on the section currently in view.
3. Client-side contact form validation and a local confirmation message. The form does not send or store information.

## Before submitting

- Review every section and make sure the biography, skills, project details, course information, and contact details are accurate.
- Add any school, program, training, certification, or experience details you want listed.
- Check image usage rights and add credits if any included asset came from another creator.
- Test the layout at 375 px, 768 px, and 1280 px; capture the required screenshots.
- Complete the AI usage documentation and remove its example rows before exporting it as a PDF.
- Zip this `portfolio-submission` folder as `Lastname_Portfolio.zip`. The original PHP/MySQL application remains outside this folder and is not part of the assignment submission.

Tailwind's official Play CDN is intended for development and learning. The class assignment permits CDN use; for a production site, build a static Tailwind stylesheet instead.
