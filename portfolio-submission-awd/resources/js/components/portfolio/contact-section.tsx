export default function ContactSection() {
    return (
    <section id="contact" className="
        scroll-mt-28
        border-t
        border-white/10
        py-12
        sm:py-16
      ">
      <h2 className="
          bg-gradient-to-r
          from-cyan-200
          via-cyan-300
          to-cyan-400
          bg-clip-text
          text-center
          text-3xl
          font-bold
          text-transparent
          sm:text-4xl
        ">Get in touch</h2>

      <div className="
          mx-auto
          mt-8
          grid
          max-w-3xl
          grid-cols-1
          gap-5
          min-[500px]:grid-cols-2
          min-[500px]:gap-20
        ">
        <article className="
            rounded-2xl
            border
            border-cyan-500/70
            bg-slate-950/20
            p-3
            shadow-lg
            shadow-indigo-950/30
          ">
          <h3 className="
              flex
              items-center
              gap-1.5
              text-base
              font-semibold
              text-slate-100
            ">
            <img className="
                h-4
                w-4
              " src="/assets/icons/email-icon.png" alt="" aria-hidden="true" />
            Send me a message
          </h3>

          <form id="contact-form" className="
              mt-2
              space-y-1.5

              [&>div]:space-y-0.5

              [&_label]:block
              [&_label]:text-xs
              [&_label]:text-slate-200

              [&_input]:h-6
              [&_input]:w-full
              [&_input]:rounded-full
              [&_input]:border
              [&_input]:border-cyan-950
              [&_input]:bg-slate-950/20
              [&_input]:px-2
              [&_input]:text-xs
              [&_input]:text-slate-100
              [&_input]:placeholder:text-slate-300/80

              [&_input:focus]:border-cyan-300
              [&_input:focus]:outline-none
              [&_input:focus]:ring-1
              [&_input:focus]:ring-cyan-300/40

              [&_textarea]:h-24
              [&_textarea]:w-full
              [&_textarea]:resize-y
              [&_textarea]:rounded-xl
              [&_textarea]:border
              [&_textarea]:border-cyan-950
              [&_textarea]:bg-slate-950/20
              [&_textarea]:px-2
              [&_textarea]:py-1
              [&_textarea]:text-xs
              [&_textarea]:text-slate-100
              [&_textarea]:placeholder:text-slate-300/80

              [&_textarea:focus]:border-cyan-300
              [&_textarea:focus]:outline-none
              [&_textarea:focus]:ring-1
              [&_textarea:focus]:ring-cyan-300/40

              [&_button]:ml-auto
              [&_button]:block
              [&_button]:rounded-full
              [&_button]:border
              [&_button]:border-cyan-400/70
              [&_button]:px-3
              [&_button]:py-1
              [&_button]:text-xs
              [&_button]:font-medium
              [&_button]:text-cyan-100
              [&_button]:transition

              [&_button:hover]:bg-cyan-400/10
              [&_button:focus-visible]:outline-2
              [&_button:focus-visible]:outline-offset-2
              [&_button:focus-visible]:outline-cyan-200

              [&>p]:min-h-4
              [&>p]:text-xs
              [&>p]:text-cyan-100
            " noValidate>
            <div>
              <label htmlFor="contact-name">Name</label>
              <input id="contact-name" name="name" type="text" placeholder="Your name" autoComplete="name" required
                minLength={2} />
            </div>
            <div>
              <label htmlFor="contact-email">Email</label>
              <input id="contact-email" name="email" type="email" placeholder="your.email@example.com"
                autoComplete="email" required />
            </div>
            <div>
              <label htmlFor="contact-message">Message</label>
              <textarea id="contact-message" name="message" placeholder="Your message here..." required
                minLength={5}></textarea>
            </div>
            <button type="submit">Send message</button>
            <p id="form-status" role="status" aria-live="polite"></p>
          </form>
        </article>

        <article className="
            rounded-2xl
            border
            border-cyan-500/70
            bg-slate-950/20
            p-3
            shadow-lg
            shadow-indigo-950/30
          ">
          <h3 className="
              flex
              items-center
              gap-1.5
              text-base
              font-semibold
              text-slate-100
            ">
            <img className="
                h-4
                w-4
              " src="/assets/icons/click-icon.png" alt="" aria-hidden="true" />
            Connect With me
          </h3>

          <div className="
              mt-1
              space-y-1

              [&>a]:flex
              [&>a]:min-h-7
              [&>a]:items-center
              [&>a]:gap-1.5
              [&>a]:rounded-xl
              [&>a]:border
              [&>a]:border-cyan-950
              [&>a]:bg-slate-950/20
              [&>a]:px-2
              [&>a]:py-1
              [&>a]:transition

              [&>a:hover]:border-cyan-500
              [&>a:hover]:bg-cyan-400/5
            ">
            <a href="https://github.com/thorvax" target="_blank" rel="noopener noreferrer">
              <img className="
                  h-4
                  w-4
                " src="/assets/icons/github-icon.png" alt="" aria-hidden="true" />
              <span className="
                  min-w-0
                  leading-4
                ">
                <span className="
                    block
                    text-xs
                    text-slate-200
                  ">Github</span>
                <span className="
                    block
                    text-[10px]
                    text-slate-300
                  ">@thorvax</span>
              </span>
            </a>
            <a href="https://www.facebook.com/throvax" target="_blank" rel="noopener noreferrer">
              <img className="
                  h-4
                  w-4
                " src="/assets/icons/fb-icon.png" alt="" aria-hidden="true" />
              <span className="
                  min-w-0
                  leading-4
                ">
                <span className="
                    block
                    text-xs
                    text-slate-200
                  ">Facebook</span>
                <span className="
                    block
                    text-[10px]
                    text-slate-300
                  ">@Throvax</span>
              </span>
            </a>
            <a href="mailto:bartolome.marc.whesley@gmail.com">
              <img className="
                  h-4
                  w-4
                " src="/assets/icons/email-icon.png" alt="" aria-hidden="true" />
              <span className="
                  min-w-0
                  break-all
                  leading-3
                ">
                <span className="
                    block
                    text-xs
                    text-slate-200
                  ">Email</span>
                <span className="
                    block
                    text-[9px]
                    text-slate-300
                  ">bartolome.marc.whesley@gmail.com</span>
              </span>
            </a>
          </div>

          <p className="
              mt-2
              rounded-xl
              border
              border-cyan-950
              bg-slate-950/20
              p-2
              text-xs
              leading-4
              text-slate-200
            ">I'm always open to new opportunities and collaborations. Feel free to reach out if you'd like to discuss
            a project or just say hello!</p>
        </article>
      </div>
    </section>
    );
}
