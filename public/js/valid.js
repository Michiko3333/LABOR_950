class Valid {
    constructor(rules = {}) {
        this.isDebug = false;
        this.rules = rules;
        this.validators = {
            required: (value) => value !== undefined && value !== null && value !== '',
            numeric: (value) => !isNaN(value),
            date: (value) => !isNaN(Date.parse(value)),
            regex: (value, pattern) => new RegExp(pattern).test(value),
            nullable: (value) => value === undefined || value === null || value === '',
            min: (value, length) => typeof value === 'string' && value.length >= parseInt(length, 10),
            max: (value, length) => typeof value === 'string' && value.length <= parseInt(length, 10),
            katakana: (value) => typeof value === 'string' && /^[\u30A0-\u30FF]+$/.test(value)
        };
    }

    setRules(rules) {
        this.rules = rules;
    }

    setDebug(bool) {
        this.isDebug = bool;
    }

    check(d) {
        const rules = this.rules;
        const validators = this.validators;
        for (const key in rules) {            
            if (rules.hasOwnProperty(key)) {
                const fieldRules = rules[key];
    
                if (!d.hasOwnProperty(key)) {
                    if (this.isDebug) console.error(`Validation failed: missing key "${key}"`);
                    return false;
                }
    
                const value = d[key];
    
                if (fieldRules.includes('nullable') && validators.nullable(value)) {
                    continue;
                }
    
                // 各ルールを適用
                for (const rule of fieldRules) {
                    
                    if (rule.startsWith('regex:')) {
                        
                        // 正規表現ルール
                        const pattern = rule.split(':')[1];
                        
                        if (!validators.regex(value, pattern)) {
                            if (this.isDebug) console.error(`Validation failed: ${key} does not match pattern ${pattern}`);
                            return false;
                        }
                    } else if (rule.startsWith('min:')) {
                        // minルール
                        const length = rule.split(':')[1];
                        if (!validators.min(value, length)) {
                            if (this.isDebug) console.error(`Validation failed: ${key} does not meet minimum length ${length}`);
                            return false;
                        }
                    } else if (rule.startsWith('max:')) {
                        // maxルール
                        const length = rule.split(':')[1];
                        if (!validators.max(value, length)) {
                            if (this.isDebug) console.error(`Validation failed: ${key} exceeds maximum length ${length}`);
                            return false;
                        }
                    } else if (rule == 'nullable') {
                        // nothing to do
                    } else if (validators[rule]) {
                        // その他のルール
                        if (!validators[rule](value)) {
                            if (this.isDebug) console.error(`Validation failed: ${key} failed rule ${rule}`);
                            return false;
                        }
                    } else {
                        if (this.isDebug) console.error(`Unknown validation rule: ${rule}`);
                        return false;
                    }
                }
            }
        }

        return true;
    }


}