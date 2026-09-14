import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', 'Manrope', 'Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Professional palette
                maroon: {
                    50: '#fdf3f3',
                    100: '#fbe4e5',
                    200: '#f6cfd1',
                    300: '#eeadb0',
                    400: '#e08286',
                    500: '#cd565c',
                    600: '#b23c43',
                    700: '#8b2830',
                    800: '#6e2027',
                    900: '#431318',
                },
                navy: {
                    50: '#f8fafc',
                    100: '#f0f4f8',
                    200: '#d9e2ec',
                    300: '#c2cfe0',
                    400: '#8b9dc3',
                    500: '#546e7a',
                    600: '#3d4f63',
                    700: '#2d3a47',
                    800: '#1a2332',
                    900: '#0f1419',
                },
                slate: {
                    50: '#f9fafb',
                    100: '#f3f4f6',
                    200: '#e5e7eb',
                    300: '#d1d5db',
                    400: '#9ca3af',
                    500: '#6b7280',
                    600: '#4b5563',
                    700: '#374151',
                    800: '#1f2937',
                    900: '#111827',
                },
            },
            spacing: {
                sidebar: '256px',
                header: '64px',
            },
            borderRadius: {
                card: '12px',
                lg: '8px',
                xl: '12px',
            },
            boxShadow: {
                sm: '0 1px 2px 0 rgba(0, 0, 0, 0.05)',
                md: '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)',
                card: '0 1px 3px 0 rgba(0, 0, 0, 0.1)',
                hover: '0 10px 15px -3px rgba(0, 0, 0, 0.1)',
            },
            transitionDuration: {
                fast: '150ms',
                standard: '200ms',
                slow: '300ms',
            },
            fontSize: {
                xs: ['12px', { lineHeight: '16px' }],
                sm: ['13px', { lineHeight: '20px' }],
                base: ['14px', { lineHeight: '20px' }],
                lg: ['16px', { lineHeight: '24px' }],
                xl: ['18px', { lineHeight: '28px' }],
                '2xl': ['20px', { lineHeight: '28px' }],
                '3xl': ['24px', { lineHeight: '32px' }],
                '4xl': ['30px', { lineHeight: '36px' }],
            },
        },
    },

    plugins: [forms],
};
