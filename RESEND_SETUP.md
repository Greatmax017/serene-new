# 🚀 Resend Setup Complete!

Great choice! Resend is perfect for Vercel deployments.

## ✅ What's Already Done

- ✅ Code updated to use Resend
- ✅ `package.json` updated with Resend dependency
- ✅ API endpoint configured at `/api/contact`
- ✅ Beautiful HTML email template created

## 📝 Next Steps

### 1. Install Dependencies

```bash
npm install
```

### 2. Verify Your Resend API Key

Make sure you've added your Resend API key to Vercel:

**In Vercel Dashboard:**

1. Go to your project
2. Settings → Environment Variables
3. Add: `RESEND_API_KEY` = `your_api_key_here`
4. Click "Save"

**Or via CLI:**

```bash
vercel env add RESEND_API_KEY
```

### 3. (Optional) Use Custom Domain Email

Right now, the "from" address is set to `onboarding@resend.dev` (Resend's test domain).

**To use your own domain** (e.g., `noreply@serenetouchcareservices.co.uk`):

1. Go to Resend Dashboard → Domains
2. Click "Add Domain"
3. Add: `serenetouchcareservices.co.uk`
4. Add the DNS records Resend provides
5. Wait for verification (usually instant)
6. Update line 43 in `/api/contact.js`:

```javascript
from: 'Serene Touch <noreply@serenetouchcareservices.co.uk>',
```

**Note:** You can test with `onboarding@resend.dev` first, then add your domain later!

### 4. Deploy to Vercel

**Push to GitHub and deploy:**

```bash
git add .
git commit -m "Setup Resend for contact form"
git push
```

Vercel will automatically deploy your changes!

**Or deploy manually:**

```bash
vercel --prod
```

### 5. Test Your Form

1. Visit your site: `https://yourdomain.com/contact-us/`
2. Fill out the form
3. Submit
4. Check email at: `amen@serenetouchcareservices.co.uk`

## 🧪 Testing Locally

```bash
# Make sure you have a .env file with your API key
echo "RESEND_API_KEY=your_key_here" > .env

# Start the dev server
npm run dev

# Visit http://localhost:3000/contact-us
```

## 📧 Email Details

Emails will be sent to: **amen@serenetouchcareservices.co.uk**

The email includes:

- ✅ Name
- ✅ Email (with reply-to set)
- ✅ Phone number
- ✅ Subject
- ✅ Message
- ✅ Professional HTML formatting
- ✅ Source information (from website)

## 🎨 Email Preview

The emails will look professional with:

- Clean header with green accent
- Organized contact information
- Formatted message section
- Footer with source info

## 📊 Resend Free Tier

- **100 emails per day**
- **3,000 emails per month**
- Perfect for contact forms!

## 🔧 Troubleshooting

### "Resend is not defined" error

```bash
npm install
```

### API Key not working

1. Check Vercel environment variables
2. Redeploy after adding variables
3. Check Resend dashboard for API key status

### Domain verification pending

- Wait a few minutes for DNS propagation
- Use `onboarding@resend.dev` while waiting
- Check DNS records are correctly added

### Emails not arriving

1. Check Vercel deployment logs: `vercel logs`
2. Check Resend dashboard for sent emails
3. Check spam folder
4. Verify API key is correct

## 📚 Resources

- Resend Dashboard: https://resend.com/emails
- Resend Documentation: https://resend.com/docs
- Vercel Dashboard: https://vercel.com/dashboard

## 🎯 Current Status

✅ Code is ready
✅ Resend is configured
✅ Package.json updated
✅ API endpoint created
🔄 Waiting for: npm install + deploy

**You're almost done! Just run `npm install` and deploy to Vercel!** 🚀
