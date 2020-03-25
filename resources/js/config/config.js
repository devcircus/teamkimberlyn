export const config = {
    appName: process.env.MIX_APP_NAME,
    timezone: process.env.MIX_FRONTEND_TIMEZONE,
    stripe: process.env.MIX_STRIPE_KEY,
    admin: {
        name: process.env.MIX_ADMIN_NAME,
        email: process.env.MIX_ADMIN_EMAIL,
        sites: {
            github: {
                profile: process.env.MIX_ADMIN_GITHUB_PROFILE,
                url: process.env.MIX_ADMIN_GITHUB_URL,
            },
            twitter: {
                profile: process.env.MIX_ADMIN_TWITTER_PROFILE,
                url: process.env.MIX_ADMIN_TWITTER_URL,
            },
        },
    },
    links: {
        template: {
            name: process.env.MIX_TEMPLATE_NAME,
            url: process.env.MIX_TEMPLATE_URL,
        },
    },
}
